@extends('layouts.admin')

@section('admin.buttons')
    {!! Form::open(["url" => "/admin/categories/search", "method" => "GET"]) !!}
        @include('partials.search')
    {!! Form::close() !!}
    <br>
    <a href="/admin/categories/create/{{ $parent ?? '' }}" class="btn btn-primary btn-block">Add New Category</a>
@stop

@section('admin.content')
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Books Categories</h3>
        </div>
        <div class="panel-body">
        	<table class="table">
        		<thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($categories as $category)
	                	<tr>
	                        <td><a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a></td>
                            <td>{{ $category->code }}</td>
	                        <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
                                    </div>
                                    <div class="col-md-2">
                                        <form id="deleteForm" action="/admin/categories/{{ $category->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="delete" data-title = "Delete {{ $category->name }} ?" class="btn btn-xs btn-danger">Delete</button>
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
        {!! $categories->appends(Request::only('search'))->render() !!}                                                        
    </div>
@stop