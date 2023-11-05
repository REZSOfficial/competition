<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionsController extends Controller
{
    public function competitions(){
        $competitions = Competition::all();
        return view('pages.competitions.competitions', compact('competitions'));
    }


    public function create(){
        return view('pages.competitions.create');
    }

    public function show(Competition $competition){
        $rounds = RoundsController::getRoundsByCompetition($competition);
        $competitors = CompetitorsController::getCompetitorsByRound($rounds);

        $data = [
            'competition' => $competition,
            'rounds' => $rounds,
            'competitors' => $competitors,
        ];
        return view('pages.competitions.show', compact('data'));
    }

    

    public function store(Request $request){
        dd($request);
        $formFields = $request->validate([
            'name' => ['required'],
            'date' => ['required'],
            'sport' => ['required'],
            'prize' => ['required'],
        ]);

        $competition = Competition::create($formFields);
        return redirect('/competitions')->with('message', 'Competition Created');

    }

    
}
