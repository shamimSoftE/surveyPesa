<?php

namespace App\Http\Controllers;

use App\Models\Refer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ReferController extends Controller
{
    public function register ($id)
    {
        $refer_id = $id;
        return view('Front.auth.ReferRegister',compact('refer_id'));
    }

    public function invitedUser(Request $request)
    {

        $request->validate([
            'phone_number' => ['required', 'numeric', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'same:password'],
            'term_condition' => 'required',
        ]);

        $user = User::create([
            'phone_number' => $request->phone_number,
            'term_condition' => $request->term_condition,
            'password' => Hash::make($request->password),
            'balance' => 500,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // store refer table data

        $userRefer = User::where('phone_number', $request->phone_number)->get()->first();
        Refer::create([
            'reference_by' =>  $request->refer_id,
            'invited_user_id' =>  $userRefer->id,
        ]);
        // add refer amount to reference by user

        $userReference = User::findOrFail($request->refer_id);
        $old_balance = $userReference->balance;
        $userReference->update([
            'balance' => $old_balance + 150,
        ]);

        return redirect(RouteServiceProvider::HOME)->with('sms', 'Congratulations You Have Got Kshs. 500');

    }

}
