<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    public function userAns(Request $request)
    {

        UserAnswer::create($request->all());

        $userAns = User::findOrFail($request->user_id);
        $old_balance = $userAns->balance;
        $userAns->update([
            'balance' => $old_balance + 100,
        ]);

        return redirect()->back();
    }

    public function ansList()
    {
        $ansQuestions = UserAnswer::latest()->get();
        return view('Back.pages.ansQuestions',compact('ansQuestions'));
    }

    public function ansDel($id)
    {
        $ansQue = UserAnswer::find($id);

        $ansQue->delete();
        return back()->with('sms','You just delete an answer');
    }
}
