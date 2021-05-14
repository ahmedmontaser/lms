@extends('layouts.user_layout')

@section('content')

	<div class="container">

		<div class="track_subjects">

			@if(count($user_subjects) > 0)
								<h1 class="mb-0">your subjects</h1>

				<div class="row">
					@foreach($user_subjects as $subject)
						<div class="col-sm-3">
							<div class="card subject">
								@if($subject->photo)
									<a href="{{route('subject',$subject->slug)}}"><img
												src="{{ asset('images') }}/{{$subject->photo->filename}}"
												class="card-img-top" alt="Subject Photo"></a>
								@else
									<a href="{{route('subject',$subject->slug)}}"><img
												src="{{ asset('images') }}/default.jpg" class="card-img-top"
												alt="Subject Photo"></a>
								@endif
								<div class="card-body">
									<h6 class="card-title"><a
												href="{{route('subject',$subject->slug)}}">{{ Str::limit($subject->title, 50) }}</a>
									</h6>
								</div>
							</div>
						</div>
					@endforeach
				</div>


			@else

				<h2 style="text-align:center;">Sorry,you are not enrolled in any subjects</h2>
				<a href="{{route('allsubjects')}}" class="no-subjects btn btn-primary">
					see our subjects
				</a>
				<img style="margin:60px 60px 60px 230px;border:none;background:transparent"
					 src="{{ asset('images') }}/15.webp" alt="Subject Photo">
			@endif


		</div>
	</div>

@endsection
