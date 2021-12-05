<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\Suggestion;

class DashboardController extends Controller
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
}
