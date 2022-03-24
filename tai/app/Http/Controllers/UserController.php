<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users', compact('user'));
    }

    public function update(User $user)
    { 
        if(Auth::user()->email == request('email')) {
        
        $this->validate(request(), [
                'name' => 'required',
              //  'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
           // $user->email = request('email');
            $user->avatar = request('avatar');
            $user->password = bcrypt(request('password'));
            $user->save();
            return back();
            
        }
        else{
            
        $this->validate(request(), [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'email' => 'email|required|unique:users,email,',
                'password' => 'required|min:6|confirmed'
            ]);
            $user->avatar = request('avatar');
            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();  
            
        }
    }
}
