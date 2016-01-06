@extends('layouts.admin')

@section('admin.buttons')
    {!! Form::open(["url" => "/admin/authors/search", "method" => "GET"]) !!}
        @include('partials.search')
    {!! Form::close() !!}
    <br>
	<a href="/admin/authors/create" class="btn btn-primary btn-block">Add New Author</a>
@stop

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Authors</h3>
        </div>
        <div class="panel-body">
        	<table class="table">
        		<thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Telephone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($authors as $author)
	                	<tr>
	                        <td>{{ $author->first_name }}</td>
                            <td>{{ $author->last_name }}</td>
                            <td>{{ $author->telephone }}</td>
	                        <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="/admin/authors/{{ $author->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="/admin/authors/{{ $author->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="delete" data-title ="Delete {{ $author->first_name }} {{ $author->last_name }} ?" class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
	                    </tr>
                    @endforeach
                </tbody>
        	</table>
        </div>
	</div>
    
    <div class="text-center">
        {!! $authors->appends(Request::only('search'))->render() !!}                                                        
    </div>
@stop