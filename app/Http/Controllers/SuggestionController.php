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
     * Process form data for
     * suggestions, can either destroy
     * or approve a list of suggestions
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function process(Request $request)
    {
        //Validation
        $validated = $request->validate([
                'suggestions' => 'required|array|min:1',
                'action' => 'required',
        ]);

        //Approve a list
        if (strtoupper($request->action) == "APPROVE"){
            foreach ($request->suggestions as $suggestion_id) {
                $this->approve(Suggestion::where('id', $suggestion_id)->firstOrFail());
            }
            return redirect()->back()->with('success', 'Words have been approved');
        }
        //Delete a list
        elseif (strtoupper($request->action) == "DELETE"){
            foreach ($request->suggestions as $suggestion_id) {
                $this->delete(Suggestion::where('id', $suggestion_id)->firstOrFail());
            }
            return redirect()->back()->with('message', 'Words have been deleted');
        }

        return redirect()->back()->with('error', 'Invalid option selected');
    }   

    /**
     * Approve a suggestion from the suggestion
     * table, add it to the words table and then
     * remove it from suggestions
     * @param $suggestion: The suggestion to be deleted
     */
    protected function approve(Suggestion $suggestion)
    {
        //Authorize this function
        $this->authorize('approve', Suggestion::class);

        //Create the word
        $newWord = new Word;
        $newWord->content=$suggestion->content;
        $newWord->wordtype_id=$suggestion->wordtype_id;
        $newWord->save();

        //Delete this word
        $this->delete($suggestion);
    }

    /**
     * Delete a suggestion from the suggestion
     * table
     * @param $suggestion: The suggestion to be deleted
     */
    protected function delete(Suggestion $suggestion){

        //Authorize this function
        $this->authorize('delete', Suggestion::class);

        //Delete this word
        $suggestion->delete();
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
          'wordtype_id' => 'required|exists:wordtypes,id',
          'word' => 'required|unique:suggestions,content|unique:words,content',
        ]);

        //Save the suggestion to the suggestions table here
        $suggestion = new Suggestion;
        $suggestion->content = $request->word;
        $suggestion->wordtype_id = $request->wordtype_id;
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
        echo "Show route";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        echo "Edit route";
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
        echo "Update route";
    }
}
