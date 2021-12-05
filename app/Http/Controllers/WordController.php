<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Grammar;
use App\Models\Suggestion;
use App\Models\Word;


class WordController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Word::class);  
    }

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
     * Process a list of words to delete etc
     */
    public function process(Request $request){

        //Validation
        $validated = $request->validate([
            'words' => 'required|array|min:1',
            'action' => 'required',
        ]);

        //Approve a list
        if (strtoupper($request->action) == "DELETE"){
            foreach ($request->words as $word_id) {
                Word::where('id', $word_id)->firstOrFail()->delete();
            }
            return redirect()->back()->with('message', 'Words have been deleted');
        }


        return redirect()->back()->with('error', 'Invalid action');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "Create route";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "Store route";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        echo "Show route";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        $types = Wordtype::all();
        return view('public.words.edit',["word" => $word, "types" => $types]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        //Validate - ignoring word id on update
        $validated = $request->validate([
        "content" => "required|unique:words,content,$word->id",
        "wordtype_id" => "required|exists:wordtypes,id"
        ]);

        //Update
        $word->update($request->all());

        return redirect()->back()->with("success","Word updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $word->delete();
    }
}
