<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class MySubjectsController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$user = auth()->user();
		$user_subjects_ids = $user->subjects->pluck('id');
		$user_subjects = $user->subjects;

		return view('mysubjects', compact('user_subjects'));
	}
}
