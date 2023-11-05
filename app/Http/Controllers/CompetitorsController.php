<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Competitor;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RoundsController;

class CompetitorsController extends Controller
{
    public function create(Competition $competition, $id){
        $round = RoundsController::getRoundByCompetitionAndRound($competition, $id);
        $data = [
            'competition' => $competition,
            'round' => $round,
        ];

        return view('pages.competitors.create', compact('data'));
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'user_email' => ['required'],
            'user_firstname' => ['required'],
            'user_lastname' => ['required'],
            'round_competition_name' => ['required'],
            'round_competition_date' => ['required'],
            'round_competition_round' => ['required'],
        ]);

        $competitor = Competitor::create($formFields);
        return redirect('/competitions')->with('message', 'Competitor added');

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
