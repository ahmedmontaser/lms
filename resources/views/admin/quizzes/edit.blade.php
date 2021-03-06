@extends('layouts.app', ['title' => __('quiz Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit quiz')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Quiz Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quizzes.index') }}" class="btn btn-sm btn-primary">{{ __('list of quizzes') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('quizzes.update', $quiz) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Quiz information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('name') }}" value="{{ old('name', $quiz->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('subject_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-subject_id">{{ __('Subject') }}</label>
                                    
                                    <select name="subject_id" required class="form-control">
                                        @foreach(\App\Models\Subject::orderBy('id','desc')->get() as $subject)
                                        <option <?php if($quiz->subject->id == $subject->id) echo 'selected'; ?> value="{{ $subject->id }}">{{ \Str::limit($subject->title, 10) }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('subject_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subject_id') }}</strong>
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