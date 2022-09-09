<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function show(User $user, Follow $follow)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $follow_count = $follow->getFollowCount($user->id);
        $follower_count = $follow->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

    public function follow(User $user){
        $follow = Follow::create([
            'follow_id' => \Auth::user()->id,
            'follower_id' => $user->id,
        ]);
        $followCount = count(Follow::where('follower_id', $user->id)->get());
        return response()->json(['followCount' => $followCount]);
    }

    public function unfollow(User $user){
        $follow = FollowUser::where('follow_id', \Auth::user()->id)->where('follower_id', $user->id)->first();
        $follow->delete();
        $followCount = count(Follow::where('follower_id', $user->id)->get());

        return response()->json(['followCount' => $followCount]);
    }
}
