<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quiz;

class QuizController extends Controller
{
	public function index() {
		$quizzes = Quiz::orderBy('id', 'desc')->paginate(10);
		return view('admin.quizzes.index', compact('quizzes'));
	}

	public function create() {
		return view('admin.quizzes.create');
	}

	public function store( Request $request ) {
		$rules = [
			'name' => 'required|min:5|max:100',
			'subject_id' => 'required|integer',
		];

		$this->validate($request, $rules);

		$quiz = Quiz::create($request->all());

		if ( $quiz ) {
			return redirect('/admin/quizzes');
		} else {
			return redirect('admin/quizzes/create');
		}
	}

	public function show( Quiz $quiz ) {
		return view('admin.quizzes.show', compact('quiz'));
	}

	public function edit( Quiz $quiz ) {

		return view('admin.quizzes.edit', compact('quiz'));
	}

	public function update( Request $request, Quiz $quiz ) {
		//
		$rules = [
			'name' => 'required|min:5|max:100',
			'subject_id' => 'required|integer',
		];

		$this->validate($request, $rules);

		if ( $quiz->update($request->all()) ) {
			return redirect('/admin/quizzes');
		} else {
			return redirect('/admin/quizzes/' . $quiz->id . '/edit');
		}
	}

	public function destroy( Quiz $quiz ) {
		$quiz->delete();
		return redirect('/admin/quizzes');
	}
}
