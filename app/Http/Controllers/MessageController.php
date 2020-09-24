<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{

    function message(){
        if(Auth::user()->is_admin==0){
            return redirect('/');
        }
        else{
        $messages=Message::get();
        return view('message',[
            'messages'=>$messages]);}
    }

    function contact(){
        if(Auth::user()->is_admin==1){
            return redirect('/');
        }
        return view('contact');
    }

    function save(Request $request){
        //validation
        $validator = $request->validate(
            [
                'name' => 'required|max:100|min:3',
                'email' => 'required|max:100|min:3',
                'phone' => 'required|max:11|min:11',
                'message' => 'required|max:1000|min:3'
            ]
            );
    
            $_name=$request->name;
            $_email=$request->email;
            $_phone=$request->phone;
            $_message=$request->message;
    
            //insert into DB
            $post=new Message();
            $post->name=$_name;
            $post->email=$_email;
            $post->phone=$_phone;
            $post->message=$_message;
            $post->save();
    
            return back()->with('error', 'Thank you for sending message!');
    }

    function delete($id){
        $message=Message::find($id);
        // if(isset($post->image))
        //     unlink($post->image);

            $message->delete();
            return redirect('/message');
        
    }
}
