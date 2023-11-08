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
        $users = UsersController::all();
        $data = [
            'competition' => $competition,
            'round' => $round,
            'users' => $users,
        ];

        return view('pages.competitors.create', compact('data'));
    }

    public function store(Request $request){
        $user_data = explode(" ", $request->user);
        $create_data = [
            'user_email' => $user_data[0],
            'user_firstname' => $user_data[1],
            'user_lastname' => $user_data[2],
            'round_competition_name' => $request->round_competition_name,
            'round_competition_date' => $request->round_competition_date,
            'round_competition_round' => $request->round_competition_round,
        ];

        $isAdded = Competitor::isCompetitorAdded($user_data[0], $request->round_competition_round, $request->round_competition_name, $request->round_competition_date);

        if(!$isAdded){
            $competitor = Competitor::create($create_data);
            return redirect('/competitions/'.$request->competition_id)->with('message', 'Competitor added');
        }else{
            return redirect('/competitions/'.$request->competition_id)->with('error', 'Competitor already added');
        }
       
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
