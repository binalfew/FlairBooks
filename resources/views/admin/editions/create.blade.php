@extends('layouts.admin')

@section('admin.content')
    <div class="panel panel-grey margin-bottom-40">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Add New Book Edition</h3>
        </div>

        <div class="panel-body">
            {!! Form::model($edition, [
                "url" => "/admin/books/$bookId/editions",
                "class" => "form-horizontal"
                ]) !!}
                @include('admin.editions.form', ['submitButtonText' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
@stop