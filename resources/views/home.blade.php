@extends('layouts.user_layout')


@section('content')
    @include('includes.home_picture')

    @auth
        @include('includes.mysubjects')
    @endauth

@endsection
