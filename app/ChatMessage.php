<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $content
 * @property int $room_id
 * @property int $user_id
 * @property \App\User $user
 * @property \App\Room $room
 */
class ChatMessage extends Model
{
    protected $fillable = [
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function withUser(User $user): self
    {
        $this->user()->associate($user);
        return $this;
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
