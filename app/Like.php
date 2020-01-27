<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($like) {
            $like->user_id = auth()->user()->id;
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
