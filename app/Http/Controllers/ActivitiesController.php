<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->activities()->create([
            'content' => $request['content'],
        ]);

        session()->flash('success', '发布成功');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        # code...
    }
}
