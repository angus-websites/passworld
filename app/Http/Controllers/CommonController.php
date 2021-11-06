<?php

namespace App\Http\Controllers;

use App\Models\CommonPassword;
use Illuminate\Http\Request;

class CommonController extends Controller
{

    public function __construct(){
        $this->authorizeResource(CommonPassword::class);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get the passwords and order by pos
        $commonPasswords = CommonPassword::orderBy('pos')->get();
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
    public function show(CommonPassword $commonPassword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Http\Response
     */
    public function edit(CommonPassword $commonPassword)
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
    public function update(Request $request, CommonPassword $commonPassword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommonPassword  $commonPassword
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommonPassword $commonPassword)
    {
        //
    }
}
