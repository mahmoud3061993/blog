<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{

    function controlAdmin(){
        $users=User::get()->where('is_admin', 1);
        return view('cp',[
            'users'=>$users
        ]);
    }

    function new(){
        return view('new');
    }

    function newone(Request $request){
        $email=$request->email;
        $password=$request->password;
        $username=$request->username;
        //
        $user=new User();
        $user->username=$username;
        $user->email=$email;
        $user->password=\Hash::make($password);
        $user->is_admin=1;
        $user->save();

        return redirect('/cp');
    }

    function register(){
        if(auth::check()){
            return redirect('/');
        }else{
        return view('register');}
    }

    function save(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $username=$request->username;
        //
        $user=new User();
        $user->username=$username;
        $user->email=$email;
        $user->password=\Hash::make($password);
        $user->save();

        return redirect('/admin');
        
    }

    function admin(){
        if(auth::check()){
            return redirect('/');
        }else{
        return view('admin');}
    }

    function login(Request $request){

        $validator = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
             
            ]
            );
        // $cred=user::get();
        $cred=$request->only('email', 'password');
        //check 
        // dd($cred);
        if (Auth::attempt($cred)) {
            // Authentication passed...
            return redirect()->intended('/');
        }else{
            //
            return back()->with('error', 'Wrong email or password');
                        
        }
}

function logout(){
        
    Auth::logout();
    return redirect('/admin');
}

function delete($id){
    $user=User::find($id);
    // if(isset($post->image))
    //     unlink($post->image);

        $user->delete();
        return redirect('/cp');
    
}

function update($id){
    $users=User::find($id);
    return view('update',[
        'users'=>$users
    ]);
}

function saveupdate($id, Request $request){

    $_username=$request->username;
    $_email=$request->email;
    $_password=$request->password;

    //select
    $user=User::find($id);
    $user->username=$_username;
    $user->email=$_email;
    $user->password=$_password;
    $user->save();

    return redirect('cp');
}

}