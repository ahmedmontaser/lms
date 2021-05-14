@extends('layouts.user_layout')

@section('content')


	<div class="container">

		<h1>Subject Information</h1>

		<div class="row">
			<div class="subject_header">
				<div class="row">
					<div class="col-sm-8">
						<h2>
							{{ $subject->title }}
						</h2>
						<p>{{ $subject->description }}</p>
						<h5>
							<span style="float:right">
								<span>{{ count($subject->users) }}</span>
								<span>users enrolled</span>
							</span>
						</h5>
					</div>

					<div class="col-sm-4">
						@if($subject->photo)
							<img src="{{ asset('images') }}/{{$subject->photo->filename}}" alt="Subject Photo">
						@else
							<img src="{{ asset('images') }}/default.jpg" alt="Subject Photo">
						@endif
					</div>
				</div>

			</div>

		</div>


		@if(count(auth()->user()->subjects()->where('slug',$subject->slug)->get()) > 0 )

		@else
			<div class="enroll-form">

				<form action="{{route('subjectenroll',$subject->slug)}}" method="POST">
					@csrf
					<input type="submit" value="Enroll" name="enroll" class="btn btn-default btn-enroll">
				</form>
			</div>

			<div class="clear-fix"></div>

		@endif

		<div class="quizzes">
			<h3>Test your knowledge</h3>
			<div class="row">
				<div class="col-sm-12">
					@if(count($subject->quizzes) > 0 )
						@if(count(auth()->user()->subjects()->where('slug',$subject->slug)->get()) > 0 )
							@foreach($subject->quizzes as $quiz)
								@if(auth()->user()->quizzes()->where('quizzes.id',$quiz->id)->first())
									<div class="quiz disabled">
										<i style="margin-right: 5px;color: whitesmoke;" class="fas fa-check"></i><a
												target="_blank"
												href="{{ route('quiz',['slug' => $quiz->subject->slug , 'name' => $quiz->name ]) }}">{{ $quiz->name }}
											quiz</a>
									</div>
								@else
									<div class="quiz">
										<a target="_blank"
										   href="{{ route('quiz',['slug' => $quiz->subject->slug , 'name' => $quiz->name ]) }}">{{ $quiz->name }}
											quiz</a>
									</div>
								@endif
							@endforeach
						@else
							@foreach($subject->quizzes as $quiz)
								<div class="quiz disabled">
									<a id="#anchor" target="_blank"
									   href="{{ route('quiz',['slug' => $quiz->subject->slug , 'name' => $quiz->name ]) }}">{{ $quiz->name }}
										quiz</a>
								</div>
							@endforeach
						@endif
					@else
						<div style="margin-top:25px;margin-left:20px;" class="alert alert-secondary">this subject
							doesn't include any quizzes
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>

	@if(count(auth()->user()->subjects()->where('slug',$subject->slug)->get()) > 0 )
		<!-- Modal -->
		<div class="modal fade" id="showvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
			 aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Video Preview</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<iframe width="750" height="415" src="" frameborder="0"
								allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
								allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	@endif

@endsection
