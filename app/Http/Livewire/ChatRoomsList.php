<?php

namespace App\Http\Livewire;

use App\Room;
use Livewire\Component;

class ChatRoomsList extends Component
{
    public $currentRoom;
    public $newRoom;

    public function mount(?Room $currentRoom = null)
    {
        $this->currentRoom = $currentRoom;
    }

    public function addRoom()
    {
        $this->validate([
            'newRoom' => ['required', 'string', 'min:1', 'max:100'],
        ]);

        $room = Room::create(['name' => $this->newRoom]);

        $this->newRoom = '';

        return redirect()->route('slackish', ['room' => $room]);
    }

    public function render()
    {
        return view('livewire.chat-rooms-list', [
            'rooms' => Room::latest()->get(),
        ]);
    }
}
