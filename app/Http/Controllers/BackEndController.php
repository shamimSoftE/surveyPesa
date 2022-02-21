<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class BackEndController extends Controller
{
   public function dashboard()
   {
       $pendingAmounts = Withdraw::where('status', 'Pending')
                                ->where('user_id', auth()->user()->id)
                                ->get();

        $withdraw = Withdraw::where('user_id', auth()->user()->id)->limit(5)->get();

       return view('Back.pages.home',compact('pendingAmounts','withdraw'));
   }

   public function profile($id)
   {
       $user = User::findOrFail($id);

       return view('Back.pages.profile',compact('user'));
   }
    public function acUser($id)
    {
        $user = User::findOrFail($id);

        $withdrawComplete = DB::table('withdraws')->where('status','Completed')->sum('amount');
        $withdrawPending = DB::table('withdraws')->where('status','Pending')->sum('amount');

        return view('Back.pages.account',compact('user','withdrawComplete','withdrawPending'));
    }

   public function profileUpdate(Request $request, $id)
   {

    $user = User::find($id);

    $user->name = $request->name;
    $user->email = $request->email;
    // $user->profession = $request->profession;
    $user->phone_number = $request->phone_number;
    // $user->date_of_birth = $request->date_of_birth;

    if($request->password === null)
    {
        $request['password'] = $user->password;
    }else
    {
        $request['password'] = Hash::make($request->password);
    }

    $img_tmp = $request->file('avatar');

    if ($img_tmp)
    {
        $img_name = $img_tmp->getClientOriginalName();
        $img_path = public_path('Back/images/user');
        $img_tmp->move($img_path,$img_name);

        $old_img = $user->avatar;

        if(file_exists($old_img)){
            unlink($old_img);
        }
        $user->avatar = $img_name;
    }
    $user->password = $request['password'];
    $user->save();
    return redirect('/dashboard')->with('sms','Information Updated');
   }

//    admin list & create

   public function create()
   {
       $admins = User::where('type', 'admin')->where('id' , '!=', auth()->user()->id)->get();
       return view('Back.pages.admins',compact('admins'));
   }

   public function store(Request $request)
   {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone_number' => ['required', 'numeric', 'unique:users'],
        'password' => ['required', Rules\Password::defaults()],
        ]);
        // dd($request->all());
    $user = User::create([
        'name' => $request->name,
        'phone_number' => $request->phone_number,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'type' => 'admin',
    ]);

    return back()->with('sms', 'Admin Created');

   }

   public function delete($id)
   {
       $user = User::find($id);

       $user->delete();

       return back()->with('warning', 'Admin Deleted');

   }

}
