<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Word;


class SuggestionController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Suggestion::class);  
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suggestions = Suggestion::all();
        return view('public.suggestions.index',["suggestions" => $suggestions]);
    }

    /**
     * Approve this user suggestion and
     * place it into the words table, then
     * remove it from suggestions
     */
    public function approve(Suggestion $suggestion)
    {
        //Authorize this function
        $this->authorize('approve', $suggestion);

        //Create the word
        $newWord = new Word;
        $newWord->content=$suggestion->content;
        $newWord->wordtype_id=$suggestion->wordtype_id;
        $newWord->save();

        //Delete this word
        $suggestion->delete();

        return redirect()->back()->with('success', 'The word has been approved');


    }

    /**
     * Provides a screen for users
     * to submit a new word to the database
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Wordtype::all();
        return view('public.suggestions.create',["types" => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Display the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }
}
