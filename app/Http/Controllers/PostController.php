<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        return 'success';
    }

    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        return response()->json([
            'message' => 'Пост успешно создан',
            'data' => $validated
        ]);
    }
}
