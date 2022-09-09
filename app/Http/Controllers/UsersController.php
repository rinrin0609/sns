<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function index() {
    $users = User::all();
    return view('index')->with('users', $users);
    }

    public function search() {
    $users = User::all();
    return view('users.search',compact('users'));
    }

    public function users_search(Request $request)
    {
         $keyword = $request->search;

        if(!empty($keyword)) {
            $query = User::query();
            $users = $query->where('username','like', '%' .$keyword. '%')->get();
            return view('users.search')->with([
            'users' => $users,
            'image' => (isset($image)),
            ]);
    }
        else{
            $message = "検索結果はありません。";
            return view('users.search')->with('message',$message);
        }
    }
}
