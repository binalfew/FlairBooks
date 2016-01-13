@extends('layouts.admin')

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
	        <h3 class="panel-title"><i class="fa fa-edit"></i> Edit: {{ $author->full_name}}</h3>
	    </div>

	    <div class="panel-body">	    	
	    	{!! Form::model($author, [
	    		"method" => "PATCH",
	    		"url" => "/admin/authors/$author->id",
	    		"class" => "form-horizontal"
	    		]) !!}
	    		@include('admin.authors.form', ['submitButtonText' => 'Update'])
	    	{!! Form::close() !!}
	    </div>
	</div>
@stop