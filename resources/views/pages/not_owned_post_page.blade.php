<div class="col l8 push-l2">
    <div class="card horizontal row">
        <div class="card-image col l5">
            <img src="{{ asset($post['image_thumbnail_path']) }}" alt="Thumbnail-image" class="responsive-img">
        </div>

        <div class="card-stacked col l7">

            <div class="card-content">
                <div class="card-title"></div>
                <ul class="collapsible">
                    <li class="active">
                        <div class="collapsible-header">
                            <i class="material-icons left">pages</i>
                            {{ $post['title'] }}
                        </div>
                        <div class="collapsible-body"><?php echo json_decode($post['content']); ?></div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
