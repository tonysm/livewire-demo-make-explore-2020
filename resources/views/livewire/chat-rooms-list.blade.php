<div>
    <div class="card border-0">
        <div class="card-header border border-gray-100">
            <h5>Rooms</h5>
        </div>

        <div class="list-group">
            @foreach($rooms as $room)
                <a class="list-group-item rounded-0 {{ $currentRoom && $currentRoom->id === $room->id ? 'list-group-item-action active' : '' }}" href="{{ route('slackish', ['room' => $room]) }}">
                    #{{ $room->name }}
                </a>
            @endforeach
            <div class="list-group-item">
                <form wire:submit.prevent="addRoom">
                    <label class="sr-only" for="inlineFormInputGroupUsername">Channel name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">#</div>
                        </div>
                        <input wire:model="newRoom" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="channel-name">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
