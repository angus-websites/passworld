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
    public function show($id)
    {
        echo "Show route";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "Edit route";
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
        echo "Update route";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "Destroy route";
    }
}
