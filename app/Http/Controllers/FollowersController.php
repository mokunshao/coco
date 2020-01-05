<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $this->authorize('follow', $user);
        if (! Auth::user()->isFollowing($user)) {
            Auth::user()->follow($user);
        }

        return back();
    }

    public function destroy(User $user)
    {
        $this->authorize('follow', $user);
        if (Auth::user()->isFollowing($user)) {
            Auth::user()->unfollow($user);
        }

        return back();
    }
}
