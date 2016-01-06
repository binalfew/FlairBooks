@extends('layouts.app')

@section('content')
	<div class="container content">
		<div class="row">
			<div class="col-md-3">
				<ul class="list-group sidebar-nav-v1" id="sidebar-nav">
					<li class="list-group-item {{ $dashboardCls ?? '' }}">
						<a href="/admin"><i class="fa fa-angle-right"></i> Dashboard</a>
					</li>
					<li class="list-group-item {{ $categoriesCls ?? '' }}">
						<a href="/admin/categories"><i class="fa fa-angle-right"></i> Categories</a>
					</li>
					<li class="list-group-item {{ $authorsCls ?? '' }}">
						<a href="/admin/authors"><i class="fa fa-angle-right"></i> Authors</a>
					</li>
					<li class="list-group-item {{ $booksCls ?? '' }}">
						<a href="/admin/books"><i class="fa fa-angle-right"></i> Books</a>
					</li>
					<li class="list-group-item {{ $usersCls ?? '' }}">
						<a href="/admin/users"><i class="fa fa-angle-right"></i> Users</a>
					</li>
					<li class="list-group-item"><a href="#"><i class="fa fa-angle-right"></i> Reviews</a></li>
					<li class="list-group-item"><a href="#"><i class="fa fa-angle-right"></i> Suggestions</a></li>
				</ul>
				@yield('admin.buttons')
			</div>

			<div class="col-md-9">
				@yield('admin.content')
			</div>
		</div>
	</div>
@stop

@section('scripts.footer')
	@include('partials.delete')
@stop