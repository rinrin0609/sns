<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts_list = DB::table('posts')
        ->leftjoin('users','users.id','=','posts.user_id')
        ->select('users.username', 'users.images', 'posts.post', 'posts.id', 'posts.user_id', 'posts.created_at')
        ->get();
        return view('posts.index',compact('posts_list'));
    }

    public function create(Request $request){
        $user_id= Auth::id();
        $post_create= $request->input('post');
        DB::table('posts')->insert([
        'user_id'=>$user_id,
        'post'=>$post_create,
        'created_at' => now(),]);
        return redirect('/top');
    }

    public function create_post(){
        $post_create= DB::table('posts')
        ->join('users','posts.id','=','users.id')
        ->select('posts.user_id','posts.post', 'users.image', 'posts.created_at')
        ->orderBy('posts.created_at', 'desc')
        ->get();
        return view('/top',['posts.index'=>$post_create]);
    }

    public function delete($id){
        \DB::table('posts')
        ->where('id',$id)
        ->delete();
        return redirect('/top');
    }

    public function update(Request $request){
    $id = $request->input('id');
    $up_post = $request->input('upPost');
    \DB::table('posts')->where('id', $id)->update(
    ['post' => $up_post,'updated_at' => now()]);
    return redirect('/top');
    }

    public function follow(){
    $user_id = Auth::id();
    $follows_id = DB::table('follows')
    ->where('follow_id','$user_id')
    ->count();
    return view('/top');
    }
}
