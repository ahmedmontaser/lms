@extends('layouts.user_layout')

@section('content')

	<div class="container">

		<div class="user-profile">

			<h3 id="name" class="heading-small text-muted mb-4">{{$user->name}} Profile</h3>
			<div class="row">
				<div class="col-sm-4">
					<div class="user-info">

						<div class="user-image">

							<p id="message" role="alert" class="alert alert-success"
							   style="font-size:16px;font-family:'lato';padding: 8px 15px;display:none"></p>
							<div id="uploaded_image">
								@if($user->photo)
									<img class="img-fluid img-thumbnail"
										 src="{{ asset('images') }}/{{$user->photo->filename}}" class="card-img-top"
										 alt="Subject Photo">
								@else
									<img class="img-fluid img-thumbnail" src="{{ asset('images') }}/default.jpg"
										 class="card-img-top" alt="Subject Photo">
								@endif

							</div>

							<a class="btn btn-primary" id="upload_btn" href=""><i class="fas fa-cloud-upload-alt"></i>
								upload</a>

							<form id="form" action="{{route('profilepost')}}" method="POST"
								  enctype="multipart/form-data">

								@csrf
								<input type="file" id="image_file" name="image">

							</form>

						</div>

						<div class="user-data">

							<ul class="list-unstyled">

								<li id="email">{{$user->email}}</li>

								<li>{{$user->score}} Points</li>

								<li><i class="fas fa-user-shield"></i>

									@if( $user->admin == 1)
										Admin
									@elseif($user->admin == 2)
										owner
									@else
										user
									@endif

								</li>

								<li style="font-weight:bold;"
									class="{{$user->email_verified_at ? 'text-success' : 'text-danger' }}">{{$user->email_verified_at ? 'Verified' : 'Unverified'}}</li>

								<li>Member since : <span
											style="margin-left:5px;">{{$user->created_at->diffForHumans()}}</span></li>
							</ul>

						</div>
					</div>


				</div>

				<div class="col-sm-1"></div>

				<div class="col-sm-7">


					<p id="error" role="alert" class="alert alert-danger"
					   style="font-size:16px;font-family:'lato';padding: 8px 15px;display:none">

						please enter your name , email and confirm your password

					</p>

					<div class="user-form">

						<form method="POST" id="user-form" action="{{route('profilepost')}}" autocomplete="off">

							@csrf
							<h3 class="heading-small text-muted mb-4">{{ __('User information') }}</h3>


							<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-name">{{ __('Name') }}</label>
								<input type="text" name="name" id="input-name"
									   class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
									   placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}"
									   required autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-email">{{ __('Email') }}</label>
								<input type="email" name="email" id="input-email"
									   class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
									   placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}"
									   required>

								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
								<label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
								<input type="password" name="password" id="input-password"
									   class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
									   placeholder="{{ __('New Password') }}" value="">

								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
								@endif
							</div>
							<div class="form-group">
								<label class="form-control-label"
									   for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
								<input type="password" name="password_confirmation" id="input-password-confirmation"
									   class="form-control form-control-alternative"
									   placeholder="{{ __('Confirm New Password') }}" value="">
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-primary mt-2">{{ __('Save') }}</button>
							</div>

						</form>
					</div>
				</div>

			</div>
		</div>


	</div>

	</div>

@endsection
