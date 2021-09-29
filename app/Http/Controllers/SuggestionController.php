<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Word;
use Illuminate\Support\Facades\Validator;


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
        $validated = $request->validate(
            [
                'suggestions' => 'required|array|min:1',
                'action' => 'required',
            ],
            [
                'required' => 'Please choose at least one suggestion',
            ]
        );

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
            return redirect()->back()->with('message', 'Suggestions have been deleted');
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
        $newWord->profanity=$suggestion->profanity;
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
        $data= $request->all() + ['content_suggestions' => $request->content];

        $rules = [
            'content' => 'required|unique:words,content',
            'content_suggestions' => 'unique:suggestions,content',
            'wordtype_id' => 'required|exists:wordtypes,id'
        ];

        $messages = [
            'content.required' => 'Please enter a word',
            'content.unique' => 'This word is already in our database',
            'content_suggestions.unique' => 'This word has already been suggested',
        ];

        $validator = Validator::make($data, $rules, $messages);
        $validator->validate();

        //Process profanity check
        $request->request->add(['profanity' => $request->profanity ? 1 : 0 ?? 0]);

        //Save the suggestion to the suggestions table here
        Suggestion::create($request->all());

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
        $types = Wordtype::all();
        return view('public.suggestions.edit',["suggestion" => $suggestion, "types" => $types]);
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
        //Validation
        $validated = $request->validate([
            'wordtype_id' => 'required|exists:wordtypes,id'
        ], ["wordtype_id.required" => "Please select a word type"]);

        //Process profanity check
        $request->request->add(['profanity' => $request->profanity ? 1 : 0 ?? 0]);

        //Update
        $suggestion->update($request->all());
        return redirect()->back()->with('success', 'Suggesition updated');
    }

    /**
     * delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Suggestion $suggestion)
    {
        echo "Delete route";
    }
}
