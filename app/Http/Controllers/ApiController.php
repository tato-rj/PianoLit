<?php

namespace App\Http\Controllers;

use App\{Api, Piece, Tag, User, Timeline, Composer, Playlist};
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->api = new Api;        
    }

    public function discover($pieces = null, $inputArray = null)
    {
        $randomTag = randval(['playful', 'melancholic', 'triumphant']);
dd($this->api->setColor('orange')->ranking('rcm'));
        $collection = collect([
            $this->api->setColor('teal')->latest(),
            $this->api->setColor('purple')->composers(),
            $this->api->setColor('lightpink')->women(),
            $this->api->setColor('yellow')->levels(),
            $this->api->setColor('orange')->ranking('rcm'),
            $this->api->setColor('red')->ranking('abrsm'),
            $this->api->setColor('teal')->improve(),
            $this->api->setColor('purple')->tag('Pieces that are ' . $randomTag, $randomTag),
            $this->api->setColor('lightpink')->periods(),
        ]);

        if (request()->wantsJson() || request()->has('api'))
            return $collection->toArray();

        return view('admin.pages.discover.index', compact(['collection', 'pieces', 'inputArray']));
    }

    public function search(Request $request)
    {
        $inputArray = $this->api->prepareInput($request);

        $results = Piece::search($inputArray, $request);

        if ($request->has('count'))
            return response()->json(['count' => $results->count()]);

        $pieces = $results->get();

        $this->api->prepare($request, $pieces, $inputArray);

        if ($request->wantsJson() || $request->has('api'))
            return $pieces;

        if ($request->has('discover'))
            return $this->discover($pieces, $inputArray);

        $tags = Tag::display()->pluck('name');
        
        return view('admin.pages.search.index', compact(['pieces', 'inputArray', 'tags']));
    }

    public function tour(Request $request)
    {
        $inputArray = $this->api->prepareInput($request);

        if (! empty($inputArray)) {
            $level = array_shift($inputArray);
            
            $mood = $inputArray[array_rand($inputArray, 1)];

            $inputArray = [$level, $mood];
        }

        $pieces = Piece::search($inputArray, $request)->get();

        if (! empty($inputArray))
            $this->api->prepare($request, $pieces, $inputArray);

        if ($request->wantsJson() || $request->has('api'))
            return $pieces;

        $levels = Tag::levels()->get();
        $lengths = Tag::lengths()->get();
        $moods = Tag::special()->get();
                
        return view('admin.pages.tour.index', compact(['pieces', 'inputArray', 'levels', 'lengths', 'moods']));
    }

    public function piece(Request $request)
    {
        $piece = Piece::findOrFail($request->search);

        $this->api->setCustomAttributes($piece, $request->user_id);

        $result[0] = $piece;

        return $result;
    }

    public function user(Request $request)
    {
        return $request->all();
    }

    public function suggestions(Request $request)
    {
        $user = User::find($request->user_id);

        if (! $user)
            return response()->json(['User not found']);

        $suggestions = $user->suggestions(10);
        
        $suggestions->each(function($piece) use ($user) {
            $this->api->setCustomAttributes($piece, $user->id);
        });

        return $suggestions;
    }

    public function tags()
    {
        return Tag::display()->orderBy('name')->get();
    }

    public function composers()
    {
        return Composer::all();
    }

    public function users()
    {
        return User::all();
    }

    public function timeline($piece_id)
    {
        return Timeline::for($piece_id, 4);
    }

    public function playlists($group)
    {
        return Playlist::journey()->sorted()->get();
    }

    public function playlist(Playlist $playlist)
    {
        $pieces = $playlist->pieces;
        
        $pieces->each(function($result) {
            $this->api->setCustomAttributes($result, request()->user_id);
        });

        return $pieces;
    }
}
