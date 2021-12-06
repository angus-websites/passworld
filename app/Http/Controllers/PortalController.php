<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Suggestion;

class PortalController extends Controller
{
    /**
     * Will load the dashboard for the user
     * and fetch all the correct stats
     */
    public function index(){
        $wordCount = Word::all()->count();
        $suggestionCount = Suggestion::all()->count();
        return view('portal.index',["wordCount" => $wordCount, "suggestionCount" => $suggestionCount]); 
    }

    /**
     * Will load the account screen
     */
    public function account(){
        return view('portal.account', ["user" => auth()->user()]); 
    }


}
