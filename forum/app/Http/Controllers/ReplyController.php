<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, $topicId)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'body' => 'required|string',
        ]);

        $reply = Reply::create([
            'topic_id' => $topicId,
            'user_id' => $validated['user_id'],
            'body' => $validated['body'],
        ]);

        return response()->json($reply, 201);
    }
}
