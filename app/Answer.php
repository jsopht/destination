<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['text', 'description', 'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function countries()
    {
        return $this->belongsToMany('App\Country', 'countries_answers');
    }
}
