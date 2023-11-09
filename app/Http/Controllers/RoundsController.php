<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoundsController extends Controller
{
    public static function getRoundsByCompetition($competition){
        $rounds = DB::table('rounds')
        ->where('competition_name', $competition->name)
        ->where('competition_date', $competition->date)
        ->get();
        return $rounds;
    }

    public static function getRoundByCompetitionAndRound($competition, $round){
        $rounds = DB::table('rounds')
        ->where('competition_name', $competition->name)
        ->where('competition_date', $competition->date)
        ->where('round', $round)
        ->get();
        return $round;
    }

    public static function isAdded($competition_name,$competition_date, $round){
        $rounds = DB::table('rounds')
        ->where('competition_name', $competition_name)
        ->where('competition_date', $competition_date)
        ->where('round', $round)
        ->get();
        
        return count($rounds) != 0;
    }

    public function create(Competition $competition){
        return view('pages.competitions/createround', compact('competition'));
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'competition_name' => ['required'],
            'competition_date' => ['required'],
            'round' => ['required'],
        ]);

        if(!RoundsController::isAdded($request->competition_name, $request->competition_date, $request->round)){
            $round = Round::create($formFields);
            return redirect('/competitions/'.$request->competition_id)->with('message', 'Round Created');
        }
        return redirect('/competitions/'.$request->competition_id)->with('addedError', 'Round already created');
    }
}
