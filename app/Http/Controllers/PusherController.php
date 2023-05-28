<?php

namespace App\Http\Controllers;
use App\Events\PusherEvent;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function triggerEvent(Request $request)
    {
        $message = $request->input('message');

        event(new PusherEvent($message));

        return response()->json(['message' => 'Event triggered!']);
    }
}
