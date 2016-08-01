<div class="form-group">
		<label for="title" >Titulo: </label>
		<input type="text" name="title" value="{{isset($post->title)?$post->title:null}}" class="form-control">

</div>
<div class="form-group">
		<label for="content">Conteudo</label>
		<textarea name="content" class="form-control" rows="10" cols="50">{{isset($post->content)?$post->content:null}}</textarea>
</div>
