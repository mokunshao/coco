<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140',
        ]);

        Auth::user()->articles()->create([
            'content' => $request['content'],
        ]);

        session()->flash('success', '发布成功');

        return redirect()->back();
    }

    public function destroy(Article $article)
    {
        $this->authorize('destroy', $article);
        $article->delete();
        session()->flash('success', '微博已被成功删除！');

        return back();
    }

    public function show(Article $article)
    {
        $comments = $article->comments()->with('user')->paginate();

        return view('articles.show', compact('article', 'comments'));
    }
}
