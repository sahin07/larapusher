<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotifyResource;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

        /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }


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
