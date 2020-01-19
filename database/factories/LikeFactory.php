<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Like;
use App\Reply;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {

    return [
        'user_id'=> function(){
            return User::all()->random();
        },
        'reply_id'=> function(){
            return Reply::all()->random();
        }
    ];

});
