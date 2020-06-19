<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Http\Requests\ReplyRequest;
use App\Post;
use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * @param Post $post
     * @param ReplyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Post $post, ReplyRequest $request)
    {
        if(auth()->check()) {
            Reply::create([
                'text' => $request->get('reply'),
                'user_id' => auth()->user()->getAuthIdentifier(),
                'post_id' => $post->id,
                ]);
            };
        return back();
    }
}
