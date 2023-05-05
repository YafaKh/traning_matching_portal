<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    /* register validatation
'id_number' => ['required', 'digits:9', 'numeric'],
'email' => 'required|email'
'email' => ['required', 'email', function ($attribute, $value, $fail) {
    if (!ends_with($value, '@aaup.edu')) {
        $fail('The '.$attribute.' must end with "@aaup.edu".');
    }
}],
'phone' => 'required|regex:/^([0-9\s\-\+\]*)$/|min:10|max:15' 
'password' => ['required', 'min:8', 'confirmed'],
'password_confirmation' => ['required'],


*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
