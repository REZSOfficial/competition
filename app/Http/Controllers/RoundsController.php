<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoundsController extends Controller
{
    

    public function create(Competition $competition){
        return view('pages.competitions/createround', compact('competition'));
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'competition_name' => ['required'],
            'competition_date' => ['required'],
            'round' => ['required'],
        ]);

        if(!Round::isAdded($request->competition_name, $request->competition_date, $request->round)){
            $round = Round::create($formFields);
            return response()->json(['message' => 'Round created successfully']);
        }
        return response()->json(['message' => 'Round already exists']);
    }
}
