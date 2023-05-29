<?php

namespace App\Http\Controllers;
use App\Events\PusherEvent;
use App\Events\ActiveDriverEvent;

use Illuminate\Http\Request;
use App\Models\User;

class PusherController extends Controller
{
    public function triggerEvent(Request $request)
    {
        $message = $request->input('message');

        event(new PusherEvent($message));

        return response()->json(['message' => 'Event triggered!']);
    }

    public function activeDriver(Request $request)
    {
        $id = $request->input('id');

        $user = User::find($id);
        $user->active = ($user->active === null || $user->active == 0) ? 1 : 0;
        $user->save();

        $total = User::where('role',1)->where('active',1)->count();
        $user->total = $total;

        event(new ActiveDriverEvent($user));

        return response()->json(['message' => $user]);
    }
}
