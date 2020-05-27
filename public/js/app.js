$(document).ready(function() {

    $('#register-btn').click(function() {
        if($('#firstname-edit').val() != "" && $('#middlename-edit').val() != "" && $('#surname-edit').val() != "" && $('#age-edit').val() != "" && $('#email-edit').val() != "" && $('#password-edit').val() != "" && $('#confirm_password-edit').val() != "" && $('#picture-edit').val() != ""  && ($('#confirm_password-edit').val()).length >= 8) {
            $('#progress-container').html(`
                <div class="progress white darken-2">
                    <div class="indeterminate purple"></div>
                </div>
            `);
        }
    });

    $('#login-btn').click(function() {
        if($('#email-login').val() != "" && $('#password-login').val() != "" && ($('#password-login').val()).length >= 8) {
            $('#progress-container').html(`
                <div class="progress white darken-2">
                    <div class="indeterminate purple"></div>
                </div>
            `);
        }
    });

    $('#logout-btn').click(function() {
        $('#progress-container').html(`
            <div class="progress white darken-2">
                <div class="indeterminate purple"></div>
            </div>
        `);
    });

    $('#post-btn').click(function(e) {
        if($('#header-post').val() != "" && tinyMCE.activeEditor.getContent() != "" && $('#image-thumbnail-post').val() != "") {
            $('#progress-container').html(`
                <div class="progress white darken-2">
                    <div class="indeterminate purple"></div>
                </div>
            `);
        }
    })

    $('.delete-btn').click(function() {
        $('#progress-container').html(`
            <div class="progress white darken-2">
                <div class="indeterminate purple"></div>
            </div>
        `);
        setInterval(() => {
            $.ajax({
                url: `/post/${$(this).attr('name')}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "",
            })
            .done(response => {
            })
            .fail(error => {
            });

            window.location.replace(`/profile/${$(this).attr('name')}`);
        }, 1000);
    });

    $('.edit-btn').click(function() {
        $.ajax({
            url: `/post/${$(this).attr('name')}/edit`,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
            },
        })
        .done(response => {
            let dataset = JSON.parse(atob(atob(JSON.parse(response)['data'])));
            $('#title-post-update').val(dataset.title);
            tinymce.get('post-creator-update').setContent(JSON.parse(dataset.content));
            $('#image-thumbnail-post-update').val(dataset.image_name);
        })
        .fail(error => {
        });
    });

    $('.update-post-btn').click(function() {
        $('#progress-container').html(`
            <div class="progress white darken-2">
                <div class="indeterminate purple"></div>
            </div>
        `);
    });
});
