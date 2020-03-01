<?php

namespace App\Http\Livewire;

use App\Room;
use Livewire\Component;

class SlackishChat extends Component
{
    public $newRoomName;
    public $currentRoomId;

    private function rules()
    {
        return [
            'newRoomName' => ['required', 'string', 'max:100'],
        ];
    }

    public function addRoom()
    {
        $this->validate($this->rules());

        Room::create([
            'name' => $this->newRoomName,
        ]);

        $this->newRoomName = '';
    }

    public function switchRoom(int $roomId)
    {
        $this->currentRoomId = $roomId;
    }

    public function render()
    {
        $allRooms = Room::query()->oldest()->get();

        return view('livewire.slackish-chat', [
            'rooms' => $allRooms,
            'currentRoom' => $this->currentRoomId ? $allRooms->find($this->currentRoomId) : null,
        ]);
    }
}
