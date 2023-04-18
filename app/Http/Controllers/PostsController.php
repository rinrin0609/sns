<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
     public function __construct(){
    $this->middleware('auth');
    }

    public function index(){
    $auth = Auth::user();
    $posts_list = DB::table('posts')
    ->leftjoin('users','users.id','=','posts.user_id')
    ->select('users.username', 'users.images', 'posts.post', 'posts.id', 'posts.user_id', 'posts.created_at')
    ->orderBy('posts.created_at', 'desc')
    ->get();
    return view('posts.index',compact('posts_list','auth'));
    }

    public function create(Request $request){
    $user_id = Auth::id();
    $post_create= $request->input('post');
    DB::table('posts')->insert([
    'user_id'=>$user_id,
    'post'=>$post_create,
    'created_at' => now(),]);
    return redirect('/top');
    }

    public function delete($id){
    DB::table('posts')
    ->where('id',$id)
    ->delete();
    return redirect('/top');
    }

    public function update(Request $request){
    $id = $request->input('id');
    $up_post = $request->input('upPost');
    DB::table('posts')->where('id', $id)->update(
    ['post' => $up_post,'updated_at' => now()]);
    return redirect('/top');
    }

    public function getUserTimeLine(Int $user_id){
    return $this->where('user_id', $user_id)
    ->orderBy('created_at', 'DESC')
    ->paginate(50);
    }

    public function follower_count(Request $request) {
    $id = $request->input('id');

    return view('/top',compact('id','follower_count'));
    }
}
