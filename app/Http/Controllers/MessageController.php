<?php

namespace App\Http\Controllers;
use App\Message;
App\Events\MessageCreatedEvent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a new message.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Message::Create([
          'message' => $request->message
          ]);

        //
    }
}
