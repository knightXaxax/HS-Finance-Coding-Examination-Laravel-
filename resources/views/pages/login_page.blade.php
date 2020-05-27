@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('main_content')
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
        <div class="col l4 m6 s10 push-l4 push-m3 push-s1">
            @include('forms.login_form')
        </div>
    </div>
@endsection
