<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use App\Models\Refer;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    public function show()
    {
        $user_id = auth()->user()->id;
        $refer = Refer::where('reference_by',$user_id)->get();
        $ansQue = UserAnswer::where('user_id',$user_id)->get();

        if($refer->count() >= '15' || $ansQue->count() == '16')
        {
            return view('Back.withdraw.pro_one',compact('ansQue','refer'));
        }
        else
        {
            return back()->with('warning', 'You must refer atleast 15 users or Answer atleast 16 questions to withdraw your balance');
        }

    }

    // process for withdraw

    public function requestWithdraw(Request $request)
    {
        $request->validate([
            'phone_number' => 'required'
        ]);
        // dd($request->all());
        $phone_number = $request->phone_number;
        return view('Back.withdraw.pro_two',compact('phone_number'));
    }

    public function requestWithdrawTwo(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);
        //  dd($request->all());
        $phone_number = $request->phone_number;
        $amount = $request->amount;
        return view('Back.withdraw.pro_three',compact('phone_number','amount'));
    }

    public function withdraw(Request $request)
    {
        $request->validate(['mpesa_code' => 'required|max:10|min:10']);
        $id = auth()->user()->id;
        Withdraw::create([
            'user_id' => $id,
            'mpesa_code' => $request->mpesa_code,
            'phone_number' => $request->phone_number,
            'amount' => $request->amount,
        ]);

        // reflect user A/C
        $user = User::findOrFail($id);
        $old_balance = $user->balance;
        $user->update([
            'balance' => $old_balance - $request->amount,
        ]);

        return redirect()->route('dashboard')->with('sms','Congratulation, Your withdraw request is under review. Please check your withdraw request after 48 hours.');
    }

    public function pendingList()
    {
        $withdrawPending = Withdraw::where('status', 'Pending')->get();
        return view('Back.pages.withdraw_pending',compact('withdrawPending'));
    }

    public function completedList()
    {
        $withdrawCompleted = Withdraw::where('status', 'Completed')->get();
        return view('Back.pages.withdraw_completd',compact('withdrawCompleted'));
    }

    public function withdrawStatus($id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->status = "Completed";
        $withdraw->save();
        return back()->with('sms', 'Withdraw mark as completed');
    }

    // public function withdrawDelete($id)
    // {
    //     $withdraw = Withdraw::find($id);
    //     $withdraw->delete();
    //     return back()->with('sms', 'Withdraw mark as canceled');
    // }

}
