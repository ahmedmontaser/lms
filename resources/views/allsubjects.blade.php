@extends('layouts.user_layout')

@section('content')

	<div class="container">
		<div class="track_subjects">
			<h1 class="mb-0">All Subjects</h1>

			<div class="row">
				@foreach($allsubjects as $subject)
					<div class="col-sm-3">
						<div class="card subject">
							@if($subject->photo)
								<a href="{{route('subject',$subject->slug)}}"><img
											src="{{ asset('images') }}/{{$subject->photo->filename}}"
											class="card-img-top" alt="Subject Photo"></a>
							@else
								<a href="{{route('subject',$subject->slug)}}"><img
											src="{{ asset('images') }}/default.jpg"
											class="card-img-top"
											alt="Subject Photo"></a>
							@endif
							<div class="card-body">
								<h6 class="card-title"><a
											href="{{route('subject',$subject->slug)}}">{{ Str::limit($subject->title, 50) }}</a>
								</h6>
								<span style="float:right">{{ count($subject->users) }} users</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="card-footer py-4">
				<nav class="d-flex justify-content-end" aria-label="...">
					{{ $allsubjects->links() }}
				</nav>
			</div>
		</div>
	</div>



@endsection
