@extends('layouts.user_layout')

@section('content')

	<div class="container">

		<div class="quiz-container">

			<h2>{{ Str::limit($quiz->subject->title,30) }} : {{ Str::limit($quiz->name,30) }} Quiz </h2>

			<div class="quiz-questions">

				<form action="{{ route('quizpost',['slug' => $quiz->subject->slug , 'name' => $quiz->name ]) }}"
					  method="POST" autocomplete="off">
					@csrf
					@foreach($quiz->questions as $question)
						<?php
						$answers = [$question->option_1, $question->option_2, $question->option_3, $question->right_answer];
						shuffle($answers)
						?>
						<div class="form-group">
							<label for="answer">{{ $question->question }}
								(<span>{{ $question->score }} Points </span>)</label>

							@foreach($answers as $answer)
								<div class="radio">
									<label><input type="radio" value="{{$answer}}"
												  name="answer{{$question->id}}">{{$answer}}</label>
								</div>
							@endforeach
						</div>
						<hr>
					@endforeach
					<input type="submit" class="btn btn-primary" name="submit">
				</form>
			</div>
		</div>
	</div>

@endsection

