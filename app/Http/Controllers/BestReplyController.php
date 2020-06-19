<?php

namespace App\Http\Controllers;

use App\Post;
use App\Reply;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class BestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        $post = $reply->post;

        try {
            $this->authorize('update', $post, auth()->user());
        } catch (AuthorizationException $e) {
            abort(403);
        }

        $post->best_reply_id = $reply->id;
        $post->save();
        return back();
    }
}
