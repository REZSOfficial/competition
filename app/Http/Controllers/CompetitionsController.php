<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Round;
use App\Models\Competitor;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $rounds = Round::getRoundsByCompetition($competition);
        $competitors = Competitor::getCompetitorsByRound($rounds[0]);
        
        $data = [
            'competition' => $competition,
            'rounds' => $rounds,
            'competitors' => $competitors,
        ];
        return view('pages.competitions.show', compact('data'));
    }

    

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required'],
            'date' => ['required'],
            'sport' => ['required'],
            'prize' => ['required'],
        ]);
        
        if(!Competition::where('name', $request->name)->exists() && $request->prize <= 9999999999){
            $competition = Competition::firstOrCreate($formFields);
            return response()->json(['message' => 'Competition created successfully', 'redirect' => '/competitions']);
        }else{
            return response()->json(['message' => 'Competition name already taken!']);
        }

        
    }

    

    
}
