@extends('template')
@section('title')
	Create Post
@endsection
@section('content')
<h1>Create a New Post</h1>
@if($errors->any())
	<ul class="alert">
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif
	<form action="{{ url('admin/posts/store') }}" method="post">
			{{ csrf_field() }}
			@include('admin.posts._form')


		<div class="form-group">
			<label for="tags">Tags: </label>
			<textarea name="tags" rows="10" cols="50" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Create">
		</div>

	</form>
@endsection
