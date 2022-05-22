<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts_list = DB::table('posts')
        ->leftjoin('users','users.id','=','posts.user_id')
        ->select('users.username','users.id','users.images','posts.post','posts.id','user.id')
        ->get();
        return view('posts.index',compact('posts_list'));
    }

    public function create(Request $request){
        $user_id= Auth::user_id();
        $post_create= Auth::post();
        DB::table('posts')->insert([
        'user_id'=>$user_id,
        'post'=>$post,
        'created_at' => now(),]);
        return redirect('/post/create');
    }

    public function createpost(){
        $post_create= DB::table('posts')
        ->join('users','posts.id','=','users.id')
        ->select('posts.user_id','posts.post', 'users.image', 'posts.created_at')
        ->orderBy('posts.created_at', 'desc')
        ->get();
        return view('/top',['posts.index'=>$post_create]);
    }
}
