<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($replies) {
            $replies->user_id = auth()->user()->id;
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }
}
