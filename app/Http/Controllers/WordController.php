<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Grammar;


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
     * Generate an example
     * grammar given the users
     * input
     * @param $type - The type of word
     * @param $word - The users chosen word
     */
    public function example(Request $request){

        //Validation
        $validated = $request->validate([
          'wordType' => 'required',
          'word' => 'required'
        ]);

        $wordType=Wordtype::where('name', '=', $request->wordType)->firstOrFail();

        ;
        //Pick a random grammar for our word type
        $grammar = $wordType->grammars()->inRandomOrder()->first();
        //Generate a phrase using our new word

        //Return it to the user
        return redirect()->back()->with('message', 'Example_word_here');
    }

    /**
     * Provides a screen for users
     * to submit a new word to the database
     *
     * @return \Illuminate\Http\Response
     */
    public function submit()
    {
        $types = Wordtype::all();
        return view('public.words.submit',["types" => $types]);
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
