<?php

namespace App\Http\Controllers;


use App\Note;
use App\Tag;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //返回当前用户的所有笔记
        $notes = $user->notes->all();

        $inverted = false;
//        return $notes;
        return view('users.index',compact('notes'));
    }
}
