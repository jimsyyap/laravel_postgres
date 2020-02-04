<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{
    protected $fillable = ['title', 'body'];
        // for mass assignments

    //q belongs to user
    public function user(){
        return $this -> belongsTo(User::class);
    }

    /*
     * so you can do $question = Question::find(1); to find user-question
     * $question -> user -> name
     * or $question -> user -> email
     */

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

}