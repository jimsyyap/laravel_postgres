<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Answer;

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

    //accessor
    public function getUrlAttribute(){
        return route('questions.show', $this -> slug);
    }

    public function getCreatedDateAttribute(){
        return $this -> created_at -> diffForHumans();
    }

    public function getStatusAttribute(){
        if ($this->answers_count > 0){
            if ($this->best_answer_id) {
                return 'answered-accepted';
            }
            return "answered";
        }

        return 'unanswered';
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    //establish relationship
    public function answers(){
        return $this -> hasMany(Answer::class);
    }
}
