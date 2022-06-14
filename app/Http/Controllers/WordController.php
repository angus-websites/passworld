<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Grammar;
use App\Models\Suggestion;
use App\Models\Word;
use Illuminate\Support\Facades\Validator;


class WordController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Word::class);  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Word::orderBy("content")->get();
        return view('public.words.index',["words" => $words]);
    }

}
