<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Word;

class GenerateController extends Controller
{
    /**
     * Display the home screen
     *
     */
    public function index()
    {   
        $swear_words = Word::where('profanity', 1);
        return view('public.home',["swear_words" => $swear_words]);
    }
}
