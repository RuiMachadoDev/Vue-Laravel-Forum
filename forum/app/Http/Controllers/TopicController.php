<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
        return response()->json(Topic::with('category', 'user')->get());
    }

    public function show(Topic $topic)
    {
        return response()->json($topic->load('replies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $topic = Topic::create($validated);

        return response()->json($topic, 201);
    }
}
