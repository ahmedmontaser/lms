<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class AllSubjectsController extends Controller
{
	public function index()
	{
		$allsubjects = Subject::paginate(8);
		return view('allsubjects',compact('allsubjects'));
	}
}
