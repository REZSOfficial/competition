<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Round extends Model
{
    protected $fillable = ['competition_name', 'competition_date', 'round'];
    public $timestamps = false;

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
        
        return count($rounds) !== 0;
    }
}
