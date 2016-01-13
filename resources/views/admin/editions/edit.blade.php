@extends('layouts.admin')

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
	        <h3 class="panel-title"><i class="fa fa-edit"></i> Edit: {{ $edition->version }}</h3>
	    </div>

	    <div class="panel-body">
	    	{!! Form::model($edition, [
	    		"method" => "PATCH",
	    		"url" => "/admin/books/$bookId/editions/$edition->id",
	    		"class" => "form-horizontal"
	    		]) !!}
	    		@include('admin.editions.form', ['submitButtonText' => 'Update'])
	    	{!! Form::close() !!}
	    </div>
	</div>
@stop