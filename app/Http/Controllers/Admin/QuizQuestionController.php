<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Response;

class QuizQuestionController extends Controller
{
	public function create( Quiz $quiz ) {
		return view('admin.quizzes.createquestion', compact('quiz'));
	}

	public function store( Request $request, Quiz $quiz ) {
		$rules = [
			'question' => 'required|min:10|max:1000',
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
			return redirect('/admin/quizzes/' . $quiz->id);
		} else {
			return redirect('admin/quizzes/' . $quiz->id . '/questions/create');
		}
	}
}
