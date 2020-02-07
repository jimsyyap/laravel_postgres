<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class FavoritesController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }

    public function store(Question $question){
        $question -> favorites() -> attach(auth() -> id());
        //*test dd($question -> favorites());
        return back();
    }

    public function destroy(Question $question){
        // remove relationship record
        $question -> favorites() -> detach(auth() -> id());
        return back();
    }
}
