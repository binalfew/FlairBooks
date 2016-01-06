@extends('layouts.admin')

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Book Details</h3>
        </div>
        <div class="panel-body">
        	<h3>{{ $book->title }}</h3>
        	<article>{{ $book->description }}</article>
        </div>
	</div>
@stop