<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Quiz;

class SubjectQuizController extends Controller
{
	public function create( Subject $subject ) {
		return view('admin.subjects.createquiz', compact('subject'));
	}

	public function store( Request $request, Subject $subject ) {
		$rules = [
			'name' => 'required|min:5|max:100',
			'subject_id' => 'required|integer',
		];

		$this->validate($request, $rules);

		$quiz = Quiz::create($request->all());

		if ( $quiz ) {
			return redirect('/admin/quizzes');
		} else {
			return redirect('admin/subjects/' . $subject->id . '/quizzes/create');
		}
	}
}
