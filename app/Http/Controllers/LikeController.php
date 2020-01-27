<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Like;
use App\Notifications\LikeNotification;
use App\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Reply $reply){

        $like  = $reply->like()->create([
            'user_id'=>auth()->id()
        ]);

        $user = $reply->user;
        //$user->notify(new LikeNotification($like));

        broadcast(new LikeEvent($reply->id,1))->toOthers();;
    }

    public function dislike(Reply $reply){
        $reply->like()->where(['user_id',auth()->id()])->first()->delete();
        broadcast(new LikeEvent($reply->id,0))->toOthers();;
    }
}
