<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

	public function index() {
		$questions = Question::orderBy('id', 'desc')->paginate(10);
		return view('admin.questions.index', compact('questions'));
	}

	public function create() {
		$quizzes = Quiz::orderBy('id','desc')->get();
		return view('admin.questions.create', compact("quizzes"));
	}

	public function store( Request $request ) {
		$rules = [
			'question' => 'required|min:5',
			'right_answer' => 'required|max:100',
			'option_1' => 'required|max:100',
			'option_2' => 'required|max:100',
			'option_3' => 'required|max:100',
			'score' => 'required',
			'quiz_id' => 'required|integer'
		];

		$this->validate($request, $rules);

		$question = Question::create($request->all());

		if ( $question ) {
			return redirect('/admin/questions');
		} else {
			return redirect('admin/questions/create');
		}
	}

	public function edit( Question $question ) {
		$quizzes = Quiz::orderBy('id','desc')->get();
		return view('admin.questions.edit', compact('question', "quizzes"));
	}

	public function update( Request $request, Question $question ) {

		$rules = [
			'question' => 'required|min:5',
			'right_answer' => 'required|max:100',
			'option_1' => 'required|max:100',
			'option_2' => 'required|max:100',
			'option_3' => 'required|max:100',
			'score' => 'required',
			'quiz_id' => 'required|integer'
		];

		$this->validate($request, $rules);

		if ( $question->update($request->all()) ) {
			return redirect('/admin/questions');
		} else {
			return redirect('/admin/questions/' . $question->id . '/edit');
		}
	}

	public function destroy( Question $question ) {
		$question->delete();
		return redirect('/admin/questions')->withStatus('question successfully deleted.');
	}
}
