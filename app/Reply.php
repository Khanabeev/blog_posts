<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isBestReply()
    {
        return $this->post->best_reply_id == $this->id;
    }

}
