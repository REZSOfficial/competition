<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{  
    public static function all(){
        return DB::table('users')->get();
    }
}
