<?php

namespace App\Traits;

trait PieceStatus
{
    public function hasScore()
    {
        return (bool) $this->score_path || $this->score_url;
    }

    public function hasAudio()
    {
        return (bool) $this->audio_path;
    }

    public function hasTags()
    {
        return $this->tags()->exists();
    }

    public function hasITunes()
    {
    	return $this->itunes_count > 0;
    }

    public function scopeWithiTunes($query)
    {
        return $query->whereNotNull('itunes');
    }

    public function hasVideos()
    {
    	return $this->videos_count > 0;
    }

    public function scopeWithVideos($query)
    {
        return $query->whereNotNull('videos');
    }

    public function isComplete()
    {
    	return $this->hasScore() && $this->hasAudio() && $this->hasTags() && $this->hasITunes() && $this->hasVideos();
    }

    public function scopeInPublicDomain($query)
    {
        return $query->whereNull('score_url');
    }
}
