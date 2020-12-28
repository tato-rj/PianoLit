<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\FindYourMatch\Quiz;

class FunnelsController extends Controller
{
    public function match()
    {
    	$quiz = (new Quiz)->generate();

    	return view('funnels.find-your-match.index', compact('quiz'));
    }

    public function matchResults(Request $request)
    {        
   		$results = (new Quiz)->findKeywords($request->input)->search();

    	return view('funnels.find-your-match.results', compact('results'))->render();
    }
}
