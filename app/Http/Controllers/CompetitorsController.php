<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Competitor;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompetitorsController extends Controller
{
    public function create(Competition $competition, Round $round){
        return $competition;
        return view('pages.competitors.create');
    }

    public function store(Request $request){
        dd($request);
        $formFields = $request->validate([
            'competition_name' => ['required'],
            'competition_date' => ['required'],
            'round' => ['required'],
        ]);

        $round = Competitor::create($formFields);
        return redirect('/competitions')->with('message', 'Round Created');

    }

    public static function getCompetitorsByRound($rounds){
        if(count($rounds) >= 1){
            $competitors = [];

            foreach($rounds as $round){
                
            }
            $competitors = DB::table('competitors')
            ->where('round_competition_name', $round->competition_name)
            ->where('round_competition_date', $round->competition_date)
            ->get();
            return $competitors;
        }
        else return $competitors = [];
    }
}
