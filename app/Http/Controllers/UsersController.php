<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //
    public function profile(){
    $user_name = Auth::user()->username;
    $email = Auth::user()->email;
    $password = Auth::user()->password;
    return view('users.profile');
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

    public function show(User $user, Tweet $tweet, Follower $follower) {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);
            return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

     public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'screen_name'   => ['required', 'string', 'max:50', Rule::unique('users')->ignore($user->id)],
            'name'          => ['required', 'string', 'max:255'],
            'profile_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'email'         => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)]
        ]);
        $validator->validate();
        $user->updateProfile($data);

        return redirect('users/'.$user->id);
    }
}
