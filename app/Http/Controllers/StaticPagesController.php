<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    public function home()
    {
        $feed = [];
        if (Auth::check()) {
            $feed = Auth::user()->feed()->paginate(30);
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
