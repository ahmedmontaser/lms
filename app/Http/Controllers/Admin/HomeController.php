<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Subject;
use App\Models\User;
use App\Models\Quiz;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $subjects = Subject::orderBy('id','desc')->limit(5)->get();
        $users = User::where('admin', 0)->orderBy('id', 'desc')->limit(5)->get();
        $quizzes = Quiz::orderBy('id','desc')->limit(5)->get();

        return view('admin.dashboard', compact( 'subjects', 'users', 'quizzes'));
    }
}
