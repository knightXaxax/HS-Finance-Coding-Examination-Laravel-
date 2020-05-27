<form action="{{ route('post_update', ['post_id' => $post['id']]) }}" method="POST" id="post-edit-modal" class="modal modal-fixed-footer" enctype="multipart/form-data">
    @csrf
    <div class="modal-content row">
        <h4 class="post-update-modal-header purple-text text-lighten-1">Update Post</h4>
        <hr>

        <div class="col l10 push-l1 input-field">
            <i class="material-icons prefix purple-text">title</i>
            <input name="title_post_update" id="title-post-update" type="text" class="validate" required placeholder="Post Title">
            <label for="title-post-update">Post Title</label>
        </div>

        <div class="col l10 push-l1 input-field">
            <textarea name="post_creator_update" id="post-creator-update"></textarea>
        </div>

        <div class="input-field col l10 push-l1">
            <div id="input-field" class="file-field input-field">
                <div class="btn purple">
                    <span class="white-text">File</span>
                    <input type="file" name="image_thumbnail_post_update">
                </div>
                <div class="file-path-wrapper">
                    <input id="image-thumbnail-post-update" class="file-path validate" type="text"  name="image_thumbnail_post_update" placeholder="Update Profile Picture">
                </div>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="submit" class="update-post-btn btn green lighten-2 waves-effect waves-light">Update</button>
        <div class="modal-action modal-close waves-effect waves-light btn grey lighten-1">Cancel</div>
    </div>
</form>
