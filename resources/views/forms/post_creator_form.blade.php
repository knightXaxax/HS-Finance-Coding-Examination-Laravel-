<form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col l8 push-l2 input-field">
        <i class="material-icons prefix purple-text">title</i>
        <input name="title" id="header-post" type="text" class="validate" required>
        <label for="header-post">Post Title</label>
    </div>

    <div class="col l8 push-l2 input-field">
        <textarea name="post_creator" id="post-creator"></textarea>
    </div>

    <div class="col l8 push-l2">
        <div id="input-field" class="file-field input-field">
            <div class="btn purple lighten-3">
                <span class="white-text">Upload</span>
                <input type="file" name="image_thumbnail_post" required>
            </div>
            <div class="file-path-wrapper">
                <input id="image-thumbnail-post" class="file-path validate" type="text" name="image_thumbnail_post" placeholder="Upload picture for thumbnail" required>
            </div>
        </div>
    </div>

    <div class="col l2"></div>
    <div class="col l8 push-l2 input-field">
        <button type="submit" id="post-btn" class="btn purple lighten-3 right waves-effect waves-light">
            <i class="material-icons right">cloud_upload</i>
            <span class=" white-text text-lighten-2">Post</span>
        </button>
    </div>
</form>
