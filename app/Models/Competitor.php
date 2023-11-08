<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competitor extends Model
{
    use HasFactory;
    protected $fillable = ['user_email', 'user_firstname', 'user_lastname', 'round_competition_name', 'round_competition_date', 'round_competition_round'];

    public static function isCompetitorAdded($email, $round, $competition_name, $competition_date){
        $rounds = DB::table('competitors')
        ->where('round_competition_name', $competition_name)
        ->where('round_competition_date', $competition_date)
        ->where('round_competition_round', $round)
        ->where('user_email', $email)
        ->get();

        

        return count($rounds) != 0;
    }
}
