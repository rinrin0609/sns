<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //
    public function profile(){
    $auth = Auth::user();
    $username = Auth::user()->username;
    $mail = Auth::user()->mail;
    $password = Auth::user()->password;
    return view('users.profile',compact('auth', 'username', 'mail', 'password'));
    }

    public function index() {
    $users = User::all();
    return view('index')->with('users', $users);
    }

    public function search(Request $request) {
    $keyword = $request->search;
    if(!empty($keyword)){
        $query = User::query();
        $users = $query->where('username','like','%'.$keyword.'%')->get();
    }else{
        $users = User::all();
    }
    $auth = Auth::user();
    $message = "検索結果はありません";
    $followings = DB::table('follows')
    ->where('follower_id',Auth::id())
    ->get();
    return view('users.search',compact('users','message','followings','auth'));
    }

    public function follow(Request $request) {
        $id = $request->input('id');
        DB::table('follows')
        ->insert([
            'follow_id' => $id,
            'follower_id' => Auth::id(),
        ]);
        return back();
    }

    public function unfollow(Request $request) {
        $id = $request->input('id');
        DB::table('follows')
        ->where([
            'follow_id' => $id,
            'follower_id' => Auth::id(),
        ])->delete();
        return back();
}

    public function follow_list() {
        $users = DB::table('users')
            ->leftjoin('follows', 'users.id', '=', 'follows.follow_id')
            ->leftjoin('posts','posts.user_id','=','users.id')
            ->where('follows.follower_id', '=', Auth::id())
            ->select('users.id', 'users.username', 'users.images', 'posts.post', 'posts.created_at')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $auth = Auth::user();
        return view('follows.followList',compact('users', 'auth'));
}

    public function follower_list() {
        $users = DB::table('users')
            ->leftjoin('follows', 'users.id', '=', 'follows.follower_id')
            ->leftjoin('posts','posts.user_id','=','users.id')
            ->where('follows.follow_id', '=', Auth::id())
            ->select('users.id', 'users.username', 'users.images', 'posts.post', 'posts.created_at')
            ->orderBy('posts.created_at', 'desc')
            ->get();
        $auth = Auth::user();
        return view('follows.followerList',compact('users', 'auth'));
}

    public function update(Request $request) {
        $id = $request->input('id');
        $auth = Auth::user();
        //
        if(!is_null($request->newpassword)){
                $newpassword = Hash::make($request->newpassword);
                DB::table('users')
                ->where('id', $id)
                ->update([
                    'password'=> $newpassword
                ]);
            }
        if(!is_null($request->images)){
            $images = $request->file('images')->store('public/images');
            DB::table('users')
            ->where('id', $id)
            ->update([
                'images' => basename($images)
            ]);
        }
        $users = DB::table('users')
            ->where('id', $id)
            ->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'bio' => $request->input('bio'),
            //
        ]);
            return back();
        }

    public function user_follow(Request $request) {
        $id = $request->input('id');
        DB::table('follows')
        ->insert([
            'follow_id' => $id,
            'follower_id' => Auth::id(),
        ]);
        return view('follows.user',compact('id'));
    }

    public function user_unfollow(Request $request) {
        $id = $request->input('id');
        DB::table('follows')
        ->where([
            'follow_id' => $id,
            'follower_id' => Auth::id(),
        ])->delete();
        return view('follows.user',compact('id'));
}
}
