<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestion;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function index()
    {

            $serveyQuestions = SurveyQuestion::latest()->get();
            return view('Back.pages.question-list',compact('serveyQuestions'));
        // }

    }

    public function create()
    {
        return view('Back.pages.question-create');
    }

    public function store(Request $request)
    {
        SurveyQuestion::create($request->all());

        return back()->with('sms', 'Survey Question Created');
    }

    public function edit($id)
    {
        $question = SurveyQuestion::find($id);
        return view('Back.pages.question-edit',compact('question'));
    }

    public function update(Request $request, SurveyQuestion $serveyQuestion)
    {
        $serveyQuestion->update($request->all());
        return back()->with('sms', 'Survey Question Updated');
    }


    public function destroy($id)
    {
        $question = SurveyQuestion::find($id);

        $question->delete();
        return back()->with('sms', 'Survey Question Deleted');
    }


    // survey question for user

    public function userQuestions()
    {
        $ansUsers  = UserAnswer::where('user_id',auth()->user()->id)->get('question_id')->toArray();

        $serveyQuestions = SurveyQuestion::whereNotIn('id', array_values($ansUsers))->get();

        return view('Back.pages.question-forUser',compact('serveyQuestions'));

    }
}
