<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'slug'=>$this->slug,
            'category_id'=>$this->category_id,
            'replies'=>ReplyResource::collection($this->replies),
            'path'=>$this->path,
            'user'=>$this->user->name,
            'userID'=>$this->user->id,
            'created_at'=>$this->created_at->diffForHumans()
        ];
    }
}
