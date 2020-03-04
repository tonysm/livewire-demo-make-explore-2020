<?php

namespace App\Http\Controllers;

use App\Room;

class SlackishController extends Controller
{
    public function index()
    {
        $currentRoomId = request('room', null);
        /** @var Room|null $currentRoom */
        $currentRoom = $currentRoomId ? Room::findOrFail($currentRoomId) : null;

        return view('slackish.index', [
            'currentRoom' => $currentRoom,
            'messages' => $currentRoom
                ? $currentRoom->chatMessages()->latest()->take(10)->with('user')->get()
                : collect(),
        ]);
    }
}
