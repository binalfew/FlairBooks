@extends('layouts.admin')

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
	        <h3 class="panel-title"><i class="fa fa-edit"></i> Edit: {{ $book->title }}</h3>
	    </div>

	    <div class="panel-body">	    	
	    	{!! Form::model($book, [
	    		"method" => "PATCH",
	    		"url" => "/admin/books/$book->id",
	    		"class" => "form-horizontal"
	    		]) !!}
	    		@include('admin.books.form', ['submitButtonText' => 'Update'])
	    	{!! Form::close() !!}
	    </div>
	</div>
@stop