<?php

namespace App\Http\Controllers;

use App\listening_answer;
use App\listening_question;
use Illuminate\Http\Request;


class listening_questionController extends Controller
{
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
        $request->validate([
            'urls' => 'required|unique:listening_questions|max:255|url',
            'ans.*' => 'required',

        ]);
        $url= new listening_question();
        $ans= new listening_answer();
        $url->urls=substr($request->urls,32,11);
        $url->save();
        $size = count(collect($request)->get('ans'));
        for ($x = 0; $x < $size; $x++) {
            $ans[$x+1] = $request->ans[$x];
        }
        $ans['listening_questions_id'] = $url->id;
        $ans->save();
        return redirect('add')->withSuccess('Record added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\listening_question  $listening_question
     * @return \Illuminate\Http\Response
     */
    public function show(listening_question $listening_question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\listening_question  $listening_question
     * @return \Illuminate\Http\Response
     */
    public function edit(listening_question $listening_question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\listening_question  $listening_question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listening_question $listening_question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\listening_question  $listening_question
     * @return \Illuminate\Http\Response
     */
    public function destroy(listening_question $listening_question)
    {
        //
    }
}
