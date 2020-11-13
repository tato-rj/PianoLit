<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Composer, Piece};

class ComposersController extends Controller
{
    public function birthdays()
    {
        $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        $calendar = Composer::all()->where('is_famous', true)->sortBy('month_of_birth')->groupBy('month_of_birth');

        if (request()->has('json'))
            return $calendar;

        return view('composers.birthdays.index', compact(['calendar', 'months']));
    }
}
