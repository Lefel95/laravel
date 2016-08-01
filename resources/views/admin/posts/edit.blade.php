@extends('template')
@section('title')
	Editar Formulario
@endsection
@section('content')
	@if($errors->any())
		<ul>
			@foreach($errors as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif
	<form action="{{url('admin/posts/update')}}" method="post">
		{{ csrf_field() }}
		@include('admin.posts._form')

	<div class="form-group">
		<label for="tags">Tags: </label>
		<textarea name="tags" rows="10" cols="50" class="form-control">
			{{isset($post->tags->name)?$post->tags->name:null}}
		</textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn.primary" value="Edit">
	</div>


	</form>
@endsection
