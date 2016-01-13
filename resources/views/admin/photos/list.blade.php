@extends('layouts.admin')

@section('admin.buttons')
    <a href="/admin/books/{{$bookId}}/photos/create" class="btn btn-primary btn-block">Add Photo</a>
@stop

@section('admin.content')
    <div class="panel panel-grey margin-bottom-40">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a href="/admin/books"><i class="fa fa-arrow-circle-o-left"></i></a> Book Photos
            </h3>
        </div>
        <div class="panel-body">
            @foreach ($photos->chunk(4) as $set)
                <div class="row">
                    @foreach($set as $photo)
                        <div class="col-md-3 gallery-image">
                            <img src="/{{ $photo->thumbnail_path }}" alt="">
                        </div>
                    @endforeach
                </div>
            @endforeach            
        </div>
    </div>
    
    <div class="text-center">
        {!! $photos->render() !!}                                                        
    </div>
@stop