<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    function show($id){
        $posts=Post::find($id);
        return view('id',[
            'post'=>$posts
        ]);
    }

    function welcome(){
        $posts=post::get();
        return view('welcome',[
            'posts'=>$posts
        ]);
    }

    function posts(){
        $posts=post::get();
        return view('posts',[
            'posts'=>$posts
        ]);
    }

    function create(){
        return view('create');
    }

    function save(Request $request){
        //validation
        $validator = $request->validate(
        [
            'title' => 'required|max:100|min:3',
            'desc' => 'required|max:100|min:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|max:1000|min:3'
        ]
        );

        // if ($validator->fails()){
        //     return redirect('/create')->withErrors($validator)->withInput();
        // }

        //image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().\Str::random(45).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imagePath = 'images/'.$name;
        }

        $_title=$request->title;
        $_desc=$request->desc;
        $_content=$request->content;

        //insert into DB
        $post=new Post();
        $post->title=$_title;
        $post->desc=$_desc;
        $post->content=$_content;
        // $post->id=Auth::user()->id;
        $post->image=$imagePath;
        $post->save();

        $post->users()->attach(Auth::user()->id);


        return redirect('/posts');
    }

    function edit($id){
        $posts=Post::find($id);
        return view('edit',[
            'post'=>$posts
        ]);
    }

    function update($id, Request $request){

        //validation
        $validator = $request->validate(
        [
            'title' => 'required|max:100|min:3',
            'desc' => 'required|max:100|min:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|max:100|min:3'
        ]
        );

        // if ($validator->fails()){
        //     return redirect('edit/'.$id) 
        //             ->withErrors($validator) 
        //             ->withInput(); 
        // }

        //image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().\Str::random(45).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imagePath = 'images/'.$name;
        }

        $_title=$request->title;
        $_desc=$request->desc;
        $_content=$request->content;
        $_image=$imagePath;

        //select
        $post=Post::find($id);
        $post->title=$_title;
        $post->desc=$_desc;
        $post->content=$_content;
        $post->image=$_image;
        $post->save();

        return redirect('show/'.$id);
    }

    function delete($id){
        $post=Post::find($id);
        // if(isset($post->image))
        //     unlink($post->image);

            $post->delete();
            return redirect('/posts');
        
    }
    
}
