@extends('layouts.admin')

@section('admin.buttons')
	<a href="/admin/books/create" class="btn btn-primary btn-block">Add New Book</a>
@stop

@section('admin.content')
    {!! Form::open(["url" => "/admin/books/search", "method" => "GET"]) !!}
        @include('partials.search')
    {!! Form::close() !!}
    <br>
	<div class="panel panel-grey margin-bottom-40">
		<div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Books</h3>
        </div>
        <div class="panel-body">
        	<table class="table">
        		<thead>
                    <tr>
                        <th>Title</th>
                        <th>Isbn</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($books as $book)
	                	<tr>
	                        <td>{{ $book->title }}</td>
                            <td>{{ $book->isbn }}</td>
	                        <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="/admin/books/{{ $book->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="/admin/books/{{ $book->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="delete" data-title ="Delete {{ $book->title }} ?" class="btn btn-xs btn-danger">Delete</button>
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
        {!! $books->appends(Request::only('search'))->render() !!}                                                        
    </div>
@stop