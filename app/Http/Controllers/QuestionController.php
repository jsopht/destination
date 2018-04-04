<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Country;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $questions = Question::with('answers')->latest()->get();

        return view('questions.index')->with(compact('questions', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();

        return view('questions.create')->with(compact('countries'));
    }

    public function store(Request $request)
    {
        if(! $question = Question::create(['text' => $request->text])) {
            return redirect()->route('questions.index')->withAlert('danger');
        }

        foreach ($request->answers as $answer) {
            $answer['question_id'] = $question->id;
            $_answer = Answer::create($answer);
            foreach ($answer['countries'] as $key => $country) {
                $_answer->countries()->attach($country);
            }
        }

        return redirect()->route('questions.index')->withAlert('success');
    }

    public function edit($id)
    {
        $question = Question::with(['answers' => function($q) {
            $q->with('countries');
        }])->find($id);

        $countries = Country::all();

        return view('questions.edit')->with(compact('question', 'countries'));
    }

    public function update($id, Request $request)
    {
        if(! Question::findOrFail($id)->update(['text' => $request->text])) {
            return redirect()->route('questions.index')->withAlert('danger');
        }
        if($request->filled('to_delete')) {
        // dd($request->to_delete);
            Answer::destroy($request->to_delete);
        }

        foreach ($request->answers as $answer) {
            if(isset($answer['id'])) {
                $_answer = Answer::with('countries')->findOrFail($answer['id']);
                $_answer->update($answer);
                $_answer->countries()->detach($_answer->countries);
            } else {
                $answer['question_id'] = $id;
                $_answer = Answer::create($answer);
            }

            foreach ($answer['countries'] as $key => $country) {
                $_answer->countries()->attach($country);
            }
        }

        return redirect()->route('questions.index')->withAlert('success');
    }

    public function destroy($id)
    {
        if(Question::destroy($id)) {
            return redirect()->route('questions.index')->withAlert('success');
        }

        return redirect()->route('questions.index')->withAlert('danger');
    }
}
