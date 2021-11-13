<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Grammar;
use App\Models\Suggestion;


class WordController extends Controller
{

    /**
     * Ajax function for generating
     * an assword
     */
    public function quick_ass(Request $request){
        //Search the keywords table
        $assword = Grammar::randomPhrase();
        //Return the results
        return response()->json($assword);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nouns=Wordtype::where('name', '=', 'Noun')->firstOrFail()->words()->get();
        $types = Wordtype::all();
        $grammars = Grammar::all();
        $phrase = Grammar::randomPhrase();
        return view('public.words.index',["types" => $types,"grammars" => $grammars,"phrase" => $phrase]);
    }

    /**
     * Provides a screen for users
     * to submit a new word to the database
     *
     * @return \Illuminate\Http\Response
     */
    public function showSuggest()
    {
        $types = Wordtype::all();
        return view('public.words.suggest',["types" => $types]);
    }


    /**
     * Save the new suggestion the user
     * gave to be approved by the admin
     *
     * @return \Illuminate\Http\Response
     */
    public function saveSuggest(Request $request)
    {
        //Validation
        $validated = $request->validate([
          'wordType' => 'required|exists:wordtypes,name',
          'word' => 'required|unique:suggestions,content|unique:words,content',
        ]);

        //Fetch the word type
        $wordTypeID=Wordtype::where('name', '=', $request->wordType)->firstOrFail()->id;

        //Save the suggestion to the suggestions table here
        $suggestion = new Suggestion;
        $suggestion->content = $request->word;
        $suggestion->wordtype_id = $wordTypeID;
        $suggestion->save();

        //Return with success message
        return redirect()->back()->with('success', 'Your word has been sent for approval!');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
