<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class SubjectController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index($slug)
	{

		$subject = Subject::where('slug',$slug)->first();

		return view('subject',compact('subject'));
	}

	public function enroll($slug)
	{
		$subject = Subject::where('slug',$slug)->first();
		$user = auth()->user();

		$user->subjects()->attach([$subject->id]);

		return redirect('subjects/'.$slug." ");
	}
}
