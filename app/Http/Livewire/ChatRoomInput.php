<?php

namespace App\Http\Livewire;

use App\ChatMessage;
use App\Events\NewChatMessage;
use App\Room;
use Livewire\Component;

class ChatRoomInput extends Component
{
    public $newMessage;
    /** @var Room */
    public $room;

    public function mount(Room $room)
    {
        $this->room = $room;
    }

    public function sendMessage()
    {
        $this->validate([
            'newMessage' => ['required', 'string', 'min:1'],
        ]);

        $this->room->chatMessages()->save(
            $message = (new ChatMessage([
                'content' => $this->newMessage,
            ]))->withUser(auth()->user())
        );

        event(new NewChatMessage($message));

        $this->newMessage = '';
    }

    public function render()
    {
        return view('livewire.chat-room-input');
    }
}
