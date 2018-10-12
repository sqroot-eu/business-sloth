@extends('layouts.app')
@section('title', config('app.name'))

@section('content')
    <div id="app"></div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
@endsection