@extends('layouts.layout')

@section('title')
    {{ $title }}
@endsection

@section('main_content')
    <div class="container">
        <div class="row"></div>
        <div class="row">
            <div class="col l8 push-l2">
                @isset($posts)
                    @if(is_array($posts))
                        @foreach($posts as $post)
                            <div class="row">

                                <div class="card-container col l10 m10 s12 push-l1 push-m1">
                                    <div class="card z-depth-2">

                                        <div class="cards-img card-image">
                                            <a href="{{ route('show_post', ['post_id' => $post['id']]) }}">
                                                <img class="responsive-img" src="{{ asset($post['img_thumb_path']) }}" alt="Thumbnail-image">
                                                <span class="card-title">{{ $post['title'] }}</span>
                                            </a>
                                        </div>

                                        <div class="card-content">
                                            <a href="{{ route('show_post', ['post_id' => $post['id']]) }}" class="black-text" style="text-decoration:none !important;">
                                                <?php echo json_decode($post['content']); ?>
                                            </a>
                                            <br>
                                            <p class="valign-wrapper">
                                                <img src="{{ asset($post['person_profile_pic']) }}" alt="Profile Picture" class="post-profile-pics left circle">
                                                <strong>wrote by: </strong>&nbsp; {{ $post['person_fullname'] }}
                                            </p>

                                            <a href="#post-delete-modal" class="delete-modal-trigger modal-trigger btn-floating red lighten-2 waves-effect waves-light right">
                                                <i class="material-icons">delete</i>
                                            </a>

                                            <a href="#post-edit-modal" name="{{ $post['id'] }}" class="modal-trigger edit-btn btn-floating blue lighten-2 waves-effect waves-light right">
                                                <i class="material-icons">edit</i>
                                            </a>

                                        </div>

                                        <div class="card-action"></div>

                                        @include('modals.post_update_modal')
                                        @include('modals.post_delete')
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endisset
            </div>
        </div>
    </div>
@endsection
