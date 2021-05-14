@extends('layouts.app', ['title' => __('Subjects Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Subjects') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('subjects.create') }}" class="btn btn-sm btn-primary">{{ __('Add subject') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    @include('includes.errors')

                    @if(count($subjects))

                    <div class="row">
                        @foreach($subjects as $subject)
                        <div class="col-sm-3" style="margin-top:15px">
                            <div class="card">
                                @if($subject->photo)
                                <img style="width:100%;height:170px;" src="{{ asset('images') }}/{{$subject->photo->filename}}" class="card-img-top" alt="Subject Photo">
                                @else
                                <img  style="width:100%;height:170px;" src="{{ asset('images') }}/default.jpg" class="card-img-top" alt="Subject Photo">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($subject->title, 20) }}</h5>

                                    <form  method="POST" action="{{ route('subjects.destroy', $subject) }}">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('subjects.show', $subject) }}" class="btn btn-info btn-sm">show</a>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to delete this subject?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    @else
                        <p class="lead text-center"> No Subjects found</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $subjects->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection