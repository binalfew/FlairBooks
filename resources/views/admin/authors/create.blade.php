@extends('layouts.admin')

@section('admin.content')
    <div class="panel panel-grey margin-bottom-40">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-plus-circle"></i> Add New Author</h3>
        </div>

        <div class="panel-body">
            {!! Form::open(["url" => "/admin/authors", "class" => "form-horizontal"]) !!}
                @include('admin.authors.form', ['submitButtonText' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@stop