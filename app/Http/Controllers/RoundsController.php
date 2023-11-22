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

        if(!Round::where('competition_name', $request->competition_name)->where('competition_date', $request->competition_date)->where('round', $request->round)->exists()){
            $round = Round::create($formFields);
            return response()->json(['message' => 'Round created successfully']);
        }
        return response()->json(['message' => 'Round already exists']);
    }
}
