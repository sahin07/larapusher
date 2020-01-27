<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Notifications\ReplyNotification;
use App\Question;
use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question,Request $request)
    {
        return ReplyResource::collection($question->replies);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Question $question)
    {

        $reply = $question->replies()->create($request->all());
        $user = $question->user;
        if($reply->user->id != $question->user->id){
            $user->notify(new ReplyNotification($reply));
        }

        return response(['reply'=> new ReplyResource($reply)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question,$id)
    {

         $reply = Reply::findOrFail($id);
         $reply->body=$request->body;
         $reply->save();
         return response('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return response('deleted');
    }
}
