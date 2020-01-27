<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'reply'=>$this->body,
            'user'=>$this->user->name,
            'created_by'=>$this->user_id,
            'likes_count'=>$this->like()->count(),
            'is_liked'=>!!$this->like()->where('user_id',auth()->id())->count(),
            'created_at'=>$this->created_at->diffForHumans(),
        ];
    }
}
