<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail'],
        ]);
        $this->middleware('guest', [
            'only' => ['create'],
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');

        return redirect('/');
    }

    public function show(User $user)
    {
        $articles = $user->articles()->orderBy('created_at', 'desc')->paginate(10);

        return view('users.show', compact('user', 'articles'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        $formData = $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $is_not_null = function ($val) {
            return ! is_null($val);
        };

        $willUpdate = array_filter($formData, $is_not_null);

        if (array_key_exists('password', $willUpdate)) {
            $willUpdate['password'] = bcrypt($willUpdate['password']);
        }

        $user->update($willUpdate);
        session()->flash('success', '资料修改成功');

        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '删除用户成功');

        return back();
    }

    protected function sendEmailConfirmationTo(User $user)
    {
        $view = 'emails.confirm';
        $data = compact('user');
        $from = 'coco@coco.com';
        $name = 'coco';
        $to = $user->email;
        $subject = '感谢注册 coco！请确认你的邮箱。';

        Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
            $message->from($from, $name)->to($to)->subject($subject);
        });
    }

    public function confirmEmail(string $token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();
        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，邮箱验证成功！');

        return redirect()->route('users.show', [$user]);
    }
}
