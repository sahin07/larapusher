<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Reply $reply){
        $reply->like()->create([
            'user_id'=>auth()->id()
        ]);
    }

    public function dislike(Reply $reply){
        $reply->like()->where(['user_id',auth()->id()])->first()->delete();
    }
}
