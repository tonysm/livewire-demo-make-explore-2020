<?php

namespace App\Http\Controllers;

use App\Room;

class SlackishController extends Controller
{
    public function index(?Room $room = null)
    {
        return view('slackish.index', [
            'currentRoom' => $room,
            'messages' => $room
                ? $room->chatMessages()->latest()->take(10)->with('user:id,name')->get()->reverse()->values()
                : collect(),
        ]);
    }
}
