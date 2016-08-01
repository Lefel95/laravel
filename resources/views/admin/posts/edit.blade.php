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
	{!!Form::model($post,['route'=>['admin.posts.update', $post->id],'method'=>'put'])!!}
	@include('admin.posts._form')

	<div class="form-group">
		{!!Form::label('tags', 'Tags')!!}
		{!!Form::textarea('tags', $post->TagList, ['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::submit('Edit', ['class'=>'btn btn-primary'])!!}
	</div>


	{!!Form::close()!!}
@endsection
