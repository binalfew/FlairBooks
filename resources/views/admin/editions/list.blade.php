@extends('layouts.admin')

@section('admin.buttons')
    {!! Form::open(["url" => "/admin/books/$bookId/editions/search", "method" => "GET"]) !!}
        @include('partials.search')
    {!! Form::close() !!}
    <br>
    <a href="/admin/books/{{$bookId}}/editions/create" class="btn btn-primary btn-block">Add New Edition</a>
@stop

@section('admin.content')
    <div class="panel panel-grey margin-bottom-40">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-tasks"></i> Book Editions</h3>
        </div>
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Publisher</th>
                        <th>Date</th>
                        <th>Version</th>
                        <th>Pages</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($editions as $edition)
                        <tr>
                            <td>{{ $edition->publisher }}</td>
                            <td>{{ $edition->published_at }}</td>
                            <td>{{ $edition->version }}</td>
                            <td>{{ $edition->pages }}</td>
                            <td>{{ $edition->price }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="/admin/books/{{ $bookId }}/editions/{{ $edition->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="/admin/books/{{ $bookId }}/editions/{{ $edition->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button id="delete" data-title ="Delete Version {{ $edition->version }} ?" class="btn btn-xs btn-danger">Delete</button>
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
        {!! $editions->appends(Request::only('search'))->render() !!}                                                        
    </div>
@stop