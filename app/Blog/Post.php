<?php

namespace App\Blog;

use App\{ShareableContent, Admin};

class Post extends ShareableContent
{
    protected $folder = 'blog';
    protected $report_by = 'title';

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($post) {
            $post->topics()->detach();
            \Storage::disk('public')->delete($post->cover_path);
        });
    }

    public function getReferencesArrayAttribute()
    {
        return unserialize($this->references);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function calculateTime()
    {
        // 124 is the number of words we read per minute on average
        return intval(ceil(str_word_count(strip_tags($this->content)) / 124));
    }

    public function hasGift()
    {
        return ! is_null($this->gift_path);
    }

    public function scopeByTopic($query, Topic $topic)
    {
        return $query->whereHas('topics', function($q) use ($topic) {
            $q->where('slug', $topic->slug);
        });
    }
}
