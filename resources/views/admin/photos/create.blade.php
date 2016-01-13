@extends('layouts.admin')

@section('styles.header')
    <link rel="stylesheet" href="/plugins/css/dropzone.css">
@stop

@section('admin.content')
    <div class="panel panel-grey margin-bottom-40">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="/admin/books/{{ $bookId }}/photos"><i class="fa fa-arrow-circle-o-left"></i></a> Add New Photo
            </h3>
        </div>

        <div class="panel-body">
            {!! Form::open(["route" => ["photo_save_path", $bookId],
                            "id" => "addPhtotosForm",
                            "class" => "dropzone",
                        "files" => true])!!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('scripts.footer')
    <script src="/plugins/js/dropzone.js"></script>
    <script>
        Dropzone.options.addPhtotosForm = {
            paramName: 'photo',
            maxFileSize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>
@stop