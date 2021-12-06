<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Wordtype;

class GenerateController extends Controller
{
    /**
     * Display the home screen
     *
     */
    public function index()
    {   
        $nouns = Wordtype::where('name', '=', 'Noun')->firstOrFail();
        $swear_words = $nouns->words();
        return view('public.home',["swear_words" => $swear_words]);
    }
}
