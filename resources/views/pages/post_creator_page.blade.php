@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('main_content')
    <div class="container">
        <div class="row"></div>
        <div class="row">
            @include('forms.post_creator_form')
        </div>
    </div>
@endsection
