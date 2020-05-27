@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('main_content')
<div class="row"></div>
<div class="row"></div>
<div class="row"></div>
    <div class="row">
        @if($online_account == true)
            @if($post_owned == true)
                @include('pages.owned_post_page')
            @else
                @include('pages.not_owned_post_page')
            @endif
        @else
            @include('pages.not_owned_post_page')
        @endif
    </div>
@endsection
