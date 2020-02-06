<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use App\Question;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $request -> validate([
            'body' => 'required'
        ]);

        $question -> answers() -> create([
            'body' => $request -> body, 
            'user_id' => \Auth::id()
        ]);

        /* 
         * or above shortened to
         * $question -> answers() -> create($request -> validate(['body' => 'required']) + ['user_id' => \Auth::id()]);
         */

        return back() -> with('success', 'Your answer was published');
    }

    /**
     * Display the specified resource.
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question, Answer $answer)
    {
        $this -> authorize('update', $answer);
        return view('answers.editanswer', compact('question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        $this -> authorize('update', $answer);
        $answer -> update($request -> validate([
            'body' => 'required',
        ]));

        return redirect() -> route('questions.show', $question -> slug) -> with('success', 'Your answer was updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
