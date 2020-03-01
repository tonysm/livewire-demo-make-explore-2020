<?php

namespace App\Http\Livewire;

use App\Room;
use Livewire\Component;

class SlackishChat extends Component
{
    public $newRoomName;

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

    public function render()
    {
        return view('livewire.slackish-chat', [
            'rooms' => Room::query()->oldest()->get(),
        ]);
    }
}
