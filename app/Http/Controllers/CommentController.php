<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        $comment = new Comment([
            'content' => $request->input('comment'),
            'user_id' => auth()->user()->id,
        ]);

        // Associate the comment with the post
        $post->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
