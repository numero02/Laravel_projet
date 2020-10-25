<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scoring;

class ScoringController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        
        $scoring = new Scoring();
        
        $scoring->id_buyer = $request->input('id_buyer');
        $scoring->id_seller = $request->input('id_seller');
        $scoring->scoring = $request->input('scoring');
        
        $scoring->save();

        return redirect()->back();

    }
}
