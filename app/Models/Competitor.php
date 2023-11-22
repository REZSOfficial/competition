<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competitor extends Model
{
    protected $fillable = ['user_email', 'user_firstname', 'user_lastname', 'round_competition_name', 'round_competition_date', 'round_competition_round'];
    public $timestamps = false;


    public static function getCompetitorsByRound($round){ 
        $competitors = DB::table('competitors')
            ->where('round_competition_name', $round->competition_name)
            ->where('round_competition_date', $round->competition_date)
            ->get();  

        return $competitors;
    }
}
