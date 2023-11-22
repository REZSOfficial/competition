<?php

namespace App\Models;

use console;
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

}
