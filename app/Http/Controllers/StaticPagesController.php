<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feed = [];
        if (Auth::check()) {
            $feed = Auth::user()->feed()->paginate(10);
        } else {
            $feed = Article::orderBy('created_at', 'desc')->with('likes', 'user')->paginate(10);
        }

        return view('static_pages/home', compact('feed'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
