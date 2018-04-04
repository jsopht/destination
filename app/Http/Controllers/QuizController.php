<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('quiz.index')->with(compact('questions'));
    }
}
