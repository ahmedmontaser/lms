@if(count($user_subjects) > 0)

	<div id="carousel-with-lb" class="carousel slide carousel-multi-item" data-interval="false" data-ride="carousel">

		<a class="btn-floating btn-primary left-arrow" href="#carousel-with-lb" data-slide="prev"><i
					class="fas fa-chevron-left"></i></a>
		<a class="btn-floating btn-primary right-arrow" href="#carousel-with-lb" data-slide="next"><i
					class="fas fa-chevron-right"></i></a>

		<div class="carousel-inner mdb-lightbox" role="listbox">
			<div id="mdb-lightbox-ui"></div>

			<div class="subject-header">
				<h3>Resume Learning</h3>
				<a href="{{ route('mysubjects') }}">My subjects</a>
				<div class="clearfix"></div>
			</div>

			@foreach($user_subjects as $subject)
				<div class="subject carousel-item <?php if ( $loop->first ) echo 'active'; ?>">

					<div class="row">
						<div class="col-sm-4 offset-sm-2">
							<figure class="col-md-4 d-md-inline-block">
								@if($subject->photo)
									<a href="{{route('subject',$subject->slug)}}"><img
												src="{{ asset('images') }}/{{$subject->photo->filename}}"
												alt="Subject Photo"></a>
								@else
									<a href="{{route('subject',$subject->slug)}}"><img
												src="{{ asset('images') }}/default.jpg" alt="Subject Photo"></a>
									@endif
									</a>
							</figure>
						</div>

						<div class="col-sm-4">
							<h3><a href="{{route('subject',$subject->slug)}}">{{ Str::limit($subject->title, 25) }}</a>
							</h3>

							<h5>{{ count($subject->users) }} users are learning this subject</h5>
						</div>


					</div>

				</div>

			@endforeach

		</div>

	</div>
@endif
