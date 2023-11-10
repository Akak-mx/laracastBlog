<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(25),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required',],
            'slug' => ['required', Rule::unique('posts', 'slug'),],
            'thumbnail' => ['required', 'image',],
            'excerpt' => ['required',],
            'body' => ['required',],
            'category_id' => ['required', Rule::exists('categories', 'id'),],
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $post = Post::create($attributes);

        return redirect("/admin/posts/{$post->slug}/edit")->with('success', 'Post created!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required',],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id),],
            'thumbnail' => ['image',],
            'excerpt' => ['required',],
            'body' => ['required',],
            'category_id' => ['required', Rule::exists('categories', 'id'),],
        ]);

        if (request()->has('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->update('thumbnails');
        }

        $post->update($attributes);

        return redirect("/admin/posts/{$post->slug}/edit")->with('success', "Post updated!");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect("/admin/posts")->with('success', "Post deleted!");
    }
}
