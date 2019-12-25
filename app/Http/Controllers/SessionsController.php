<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            session()->flash('success', '欢迎回来！');
            $default = route('users.show', [Auth::user()]);
            return redirect()->intended($default);
        }

        session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
        return redirect()->back()->withInput();
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
