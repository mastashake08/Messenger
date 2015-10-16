<?php
namespace App\Http\Controllers;

use App\Events\MessageCreatedEvent;
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

        $message = $request->message;
          event(new MessageCreatedEvent($message));
          return $message;

        //
    }
}
