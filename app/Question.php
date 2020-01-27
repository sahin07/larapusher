<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;

class Question extends Model
{
    protected $fillable = [
        'title',
        'body',
        'slug',
        'category_id'
    ];

    protected $with = ['replies'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class)->latest();
    }

    public function getPathAttribute(){
        return 'question/'.$this->slug;
    }

    public function setTitleAttribute($value)
    {
    $this->attributes['title'] = $value;
    $this->attributes['slug'] = str_slug($value);
    }
}
