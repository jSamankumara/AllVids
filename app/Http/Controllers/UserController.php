<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Users;

class UserController extends Controller
{
    public function userSignup(Request $request){

        // dd($request->all());

        Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|max:10|min:5|unique:users,user_name',
            'password' => 'required|max:10|min:5',
        ])->validateWithBag('signup');

        $user = new Users;
        $user->email=$request->email;
        $user->user_name=$request->username;
        $user->password=$request->password;
        $user->access_level=1;
        $saved=$user->save();

        if($saved){
            $request->session()->flash('regstatus', 'Registration was successful!');
        }else{
            $request->session()->flash('regstatus', 'Please try again!');
        }

        return redirect()->back();
    }

    public function userLogin(Request $request){

        Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ])->validateWithBag('login');

        $user = DB::table('users')
                ->where('user_name', '=', $request->username)
                ->where('password', '=', $request->password)
                ->first();

                if($user===null){
                    $request->session()->flash('logstatus', 'Incorrect username or password');
                }else{
                    session(['user' => $user]);
                }

        return redirect()->back();
    }
}
