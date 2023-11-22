<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    protected $fillable = ['name', 'date', 'sport', 'prize'];
    public $timestamps = false;

    public static function isAdded($name){
        $comps = DB::table('competitions')
        ->where('name', $name)->get();

        return count($comps) !== 0;
    }
}
