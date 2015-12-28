@extends('layouts.admin')

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
	        <h3 class="panel-title"><i class="fa fa-tasks"></i> Update Category</h3>
	    </div>

	    <div class="panel-body">
	    	{!! Form::model($category, [
	    		"method" => "PATCH",
	    		"url" => "/admin/categories/$category->id",
	    		"class" => "form-horizontal"
	    		]) !!}
	    		@include('admin.categories.form', ['submitButtonText' => 'Update'])
	    	{!! Form::close() !!}
	    </div>
	</div>
@stop