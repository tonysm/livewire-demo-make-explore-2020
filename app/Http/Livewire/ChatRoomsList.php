<?php

namespace App\Http\Livewire;

use App\Room;
use Livewire\Component;

class ChatRoomsList extends Component
{
    public $currentRoomId;
    public $newRoom;

    public function mount(?Room $activeRoom = null)
    {
        $this->currentRoomId = optional($activeRoom)->getKey();
    }

    public function addRoom()
    {
        $this->validate([
            'newRoom' => ['required', 'string', 'min:1', 'max:100'],
        ]);

        Room::create(['name' => $this->newRoom]);

        $this->newRoom = '';
    }

    public function render()
    {
        return view('livewire.chat-rooms-list', [
            'rooms' => Room::latest()->get(),
        ]);
    }
}
