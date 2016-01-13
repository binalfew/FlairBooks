@extends('layouts.admin')

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
	        <h3 class="panel-title"><i class="fa fa-plus-circle"></i> New Category</h3>
	    </div>

	    <div class="panel-body">
	    	{!! Form::open(["url" => "/admin/categories/$parent", "class" => "form-horizontal"]) !!}
	    		@include('admin.categories.form', ['submitButtonText' => 'Save'])
	    	{!! Form::close() !!}
	    </div>
	</div>
@stop