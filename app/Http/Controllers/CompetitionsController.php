<?php

namespace App\Http\Controllers;

use Exception;
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
        $formFields = $request->validate([
            'name' => ['required'],
            'date' => ['required'],
            'sport' => ['required'],
            'prize' => ['required'],
        ]);

        if(!CompetitionsController::isAdded($request->name) && $request->prize <= 9999999999){
            $competition = Competition::firstOrCreate($formFields);
            return response()->json(['message' => 'Competition created successfully']);
        }else{
            return redirect('/competitions/create')->with('error', 'Competition name already taken');
        }

        
    }

    public static function isAdded($name){
        $comps = DB::table('competitions')
        ->where('name', $name)->get();

        return count($comps) != 0;
    }

    
}
