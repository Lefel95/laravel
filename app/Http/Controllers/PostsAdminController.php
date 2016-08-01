<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostsAdminController\__construct;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsAdminController extends Controller
{
	public function __construct(Post $post){


		$this->post = $post;
	}


    public function index()
    {
    	$posts = $this->post->paginate(5);

    	return view ('admin.posts.index', compact('posts'));
    }
    public function create()
    {
    	return view ('admin.posts.create');
    }
    public function store(PostRequest $request)
    {
			$post = Post::create($request->all());

			$post->tags()->sync($this->getTagIDs($request->tags));

    	return redirect()->route('admin.posts.index');
    }
    public function edit($id)
    {
    	$post = $this->post->find($id);
    	return view('admin.posts.edit', compact('post'));
    }
    public function update($id, PostRequest $request)

    {

    	$post = $this->post->find($id)->update($request->all());
			$post = $this->post->find($id);
			$post->tags()->sync($this->getTagIDs($request->tags));

    	return redirect()->route('admin.posts.index');
    }
    public function destroy($id)
    {
    	$this->post->find($id)->delete();
    	return redirect()->route('admin.posts.index');
    }
		private function getTagIDs($tags)
		{
			$taglist = array_filter(array_map('trim', explode(',', $tags)));
			$tagsIDs = [];
			foreach ($taglist as $tagName) {
				$tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
			}
			return $tagsIDs;
		}
}
