@extends('layouts.main')

@section('content')
    <div id="app" data-user="{{ auth()->check() ? json_encode(auth()->user()) : 'null' }}"></div>
    @vite('resources/js/main.js')
@endsection