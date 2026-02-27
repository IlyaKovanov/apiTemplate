<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::where('is_published', 1)
            ->paginate(20);
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();
        $post = Post::firstOrCreate(['title' => $validated['title']], $validated);

        return response()->json([
            'message' => isset($post['is_published']) ? 'Пост с таким заголовком уже существует ' : 'Пост успешно создан',
            'data' => $post
        ]);
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();
        $post->update(['title' => $validated['title']]);
        return $post;
    }

    public function destroy(Post $post)
    {

        $post->delete();

        return response()->json([
            'message' => 'Пост ID:' . $post->id . ' перемещен в корзину'
        ]);
    }
}
