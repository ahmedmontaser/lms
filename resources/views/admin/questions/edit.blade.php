@extends('layouts.app', ['title' => __('question Management')])

@section('content')
	@include('admin.users.partials.header', ['title' => __('Edit question')])

	<div class="container-fluid mt--7">
		<div class="row">
			<div class="col-xl-12 order-xl-1">
				<div class="card bg-secondary shadow">
					<div class="card-header bg-white border-0">
						<div class="row align-items-center">
							<div class="col-8">
								<h3 class="mb-0">{{ __('Question Management') }}</h3>
							</div>
							<div class="col-4 text-right">
								<a href="{{ route('questions.index') }}"
								   class="btn btn-sm btn-primary">{{ __('list of questions') }}</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('questions.update', $question) }}" autocomplete="off">
							@csrf
							@method('put')

							<h6 class="heading-small text-muted mb-4">{{ __('Question information') }}</h6>
							<div class="pl-lg-4">
								<div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-title">{{ __('title') }}</label>
									<input type="text" name="title" id="input-title"
										   class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}"
										   placeholder="{{ __('title') }}" value="{{ old('title', $question->title) }}"
										   required autofocus>

									@if ($errors->has('title'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
									@endif
								</div>

								<div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
									<label class="form-control-label"
										   for="input-right_answer">{{ __('right answer') }}</label>
									<input type="text" name="right_answer" id="input-right_answer"
										   class="form-control form-control-alternative{{ $errors->has('right_answer') ? ' is-invalid' : '' }}"
										   placeholder="{{ __('right_answer') }}"
										   value="{{ old('right_answer', $question->right_answer) }}" required
										   autofocus>

									@if ($errors->has('right_answer'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('right_answer') }}</strong>
                                        </span>
									@endif
								</div>

								<div class="form-group{{ $errors->has('option_1') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-option_1">{{ __('option 1') }}</label>
									<input type="text" name="option_1" id="input-option_1"
										   class="form-control form-control-alternative{{ $errors->has('option_1') ? ' is-invalid' : '' }}"
										   placeholder="{{ __('option 1') }}"
										   value="{{ old('option_1', $question->option_1) }}" required autofocus>

								@if ($errors->has('option_1'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('option_1') }}</strong>
                                        </span>
									@endif
								</div>


								<div class="form-group{{ $errors->has('option_2') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-option_2">{{ __('option 2') }}</label>
									<input type="text" name="option_2" id="input-option_2"
										   class="form-control form-control-alternative{{ $errors->has('option_2') ? ' is-invalid' : '' }}"
										   placeholder="{{ __('option 2') }}"
										   value="{{ old('option_2', $question->option_2) }}" required autofocus>

								@if ($errors->has('option_2'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('option_2') }}</strong>
                                        </span>
									@endif
								</div>

								<div class="form-group{{ $errors->has('option_3') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-option_3">{{ __('option_3') }}</label>
									<input type="text" name="option_3" id="input-option_3"
										   class="form-control form-control-alternative{{ $errors->has('answers') ? ' is-invalid' : '' }}"
										   placeholder="{{ __('option 3') }}"
										   value="{{ old('option_3', $question->option_3) }}" required autofocus>

								@if ($errors->has('option_3'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('option_3') }}</strong>
                                        </span>
									@endif
								</div>



								<div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-track_id">{{ __('score') }}</label>

									<select name="score" required class="form-control">
										<option <?php if ( $question->score == 5 ) echo 'selected'; ?> value="5">5
										</option>
										<option <?php if ( $question->score == 10 ) echo 'selected'; ?> value="10">10
										</option>
										<option <?php if ( $question->score == 15 ) echo 'selected'; ?> value="15">15
										</option>
										<option <?php if ( $question->score == 20 ) echo 'selected'; ?> value="20">20
										</option>
										<option <?php if ( $question->score == 25 ) echo 'selected'; ?> value="25">25
										</option>
										<option <?php if ( $question->score == 30 ) echo 'selected'; ?> value="30">30
										</option>
									</select>

									@if ($errors->has('score'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('score') }}</strong>
                                        </span>
									@endif
								</div>


								<div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
									<label class="form-control-label" for="input-quiz_id">{{ __('quiz') }}</label>

									<select name="quiz_id" required class="form-control">
										@foreach($quizzes as $quiz)
											<option
												<?php if ( $question->quiz_id == $quiz->id ) echo 'selected'; ?> value="{{ $quiz->id }}">{{ $quiz->name }}</option>
										@endforeach
									</select>

									@if ($errors->has('quiz_id'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quiz_id') }}</strong>
                                        </span>
									@endif
								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		@include('layouts.footers.auth')
	</div>
@endsection