@extends('layouts.app', ['title' => __('Subjects Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Preview Subjects')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Subject Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row the_subject">
                            <div class="col-sm-4">

                                <div class="subject-image">
                                    @if($subject->photo)
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$subject->photo->filename}}" alt="Subject Photo">
                                    @else
                                        <img style="width:100%;height:170px;" src="{{ asset('images') }}/default.jpg" alt="Subject Photo">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm">

                                <div class="subject-info">
                                    <h3>{{ \Str::limit($subject->title, 20) }}</h3>
                                </div>
                            </div>


                        </div>


                        <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Subject Videos') }}</h3>
                            </div>
                            <div class="col-2 text-right">
                                <a href="{{ route('subjects.videos.create', $subject) }}" class="btn btn-sm btn-primary">{{ __('New Video') }}</a>
                            </div>
                            <div class="col-2 text-right">
                                <a href="{{ route('subjects.quizzes.create', $subject) }}" class="btn btn-sm btn-primary">{{ __('New Quiz') }}</a>
                            </div>
                        </div>
                    </div>
                        <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject->videos as $video)
                                    <tr>
                                        <td title="{{ $video->title }}"><a href="{{ route('videos.show', $video) }}"> {{ \Str::limit($video->title, 50) }} </a></td>
                                        <td>{{ $video->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('videos.destroy', $video) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <a class="dropdown-item" href="{{ route('videos.edit', $video) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this video?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>    
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection