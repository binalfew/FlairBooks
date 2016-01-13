@extends('layouts.admin')

@section('admin.content')
    <div class="panel panel-grey margin-bottom-40">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-plus-circle"></i> Add New Book</h3>
        </div>

        <div class="panel-body">
            {!! Form::open(["url" => "/admin/books", "class" => "form-horizontal"]) !!}
                @include('admin.books.form', ['submitButtonText' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@stop