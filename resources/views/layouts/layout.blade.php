<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/materialize/css/materialize.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{ config('app.name') }} | @yield('title')</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col l12 m12 s12">
                <div id="progress-container"></div>
                @yield('main_content')
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('vendor/materialize/js/materialize.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.modal').modal({
                dismissible: true,
                opacity: .4,
                in_duration: 700,
                out_duration: 700,
                }
            );
            $('.collapsible').collapsible();
            tinymce.init({
                selector: '#post-creator',
                height:400,
                plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
                ],
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
                menu: {
                    file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
                    edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
                    view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
                    insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
                    tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
                    table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
                    help: { title: 'Help', items: 'help' }
                },
                menubar: 'favs file edit view insert format tools table help',
            });
            tinymce.init({
                selector: '#post-creator-update',
                height:400,
                plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
                ],
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
                menu: {
                    file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
                    edit: { title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
                    view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
                    insert: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
                    tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
                    table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
                    help: { title: 'Help', items: 'help' }
                },
                menubar: 'favs file edit view insert format tools table help',
            });
        });
    </script>
</body>
</html>
