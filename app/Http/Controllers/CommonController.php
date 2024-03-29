<?php

namespace App\Http\Controllers;

use App\Models\CommonPassword;
use Illuminate\Http\Request;

class CommonController extends Controller
{

    public function __construct(){
        $this->authorizeResource(CommonPassword::class, "common");
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get the passwords and order by pos (limit to 500 for now)
        $commonPasswords = CommonPassword::orderBy('pos')->take(500)->get();
        //Return the view along with the array
        return view('public.common.index',["commonPasswords" => $commonPasswords]);
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
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Http\Response
     */
    public function show(CommonPassword $common)
    {
        echo "Viewing commmon password";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonPassword $common)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommonPassword $common)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CommonPassword $common)
    {
        //Delete
        $common->delete();

        //Return with flash
        return redirect()->back()->with('message', 'Word has been deleted');
    }
}
