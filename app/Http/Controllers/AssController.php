<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grammar;


class AssController extends Controller
{
    /**
     * Display the Assword screen
     */
    public function index()
    {
        //Get the passwords and order by pos
        $assword = Grammar::randomPhrase();
        //Return the view along with the array
        return view('public.ass',["assword" => $assword]);
    }
}
