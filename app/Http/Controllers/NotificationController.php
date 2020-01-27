<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotifyResource;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        return[
            'read'=>NotifyResource::collection(auth()->user()->readNotifications),
            'unread'=>NotifyResource::collection(auth()->user()->unreadNotifications),
        ];
    }

    public function readQuestion(Request $request,$id){

        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    }



}
