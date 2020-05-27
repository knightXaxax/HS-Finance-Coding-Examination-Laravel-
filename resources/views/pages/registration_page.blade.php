@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('main_content')
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
    <div class="row">
        <div id="registration-form" class="col l6 m10 s10 push-l3 push-m1 push-s1">
            @include('forms.registration_form')
        </div>
    </div>
@endsection
