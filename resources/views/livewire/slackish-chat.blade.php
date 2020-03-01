<div>
    <div class="container">
        @if(flash()->message)
            <div class="row">
                <div class="col-md-12">
                        <div class="alert {{ flash()->class ?? 'alert-success' }}" role="alert">
                            {{ flash()->message }}
                        </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Rooms</h3>
                    </div>

                    <ul class="list-unstyled list-group cursor-pointer">
                        @foreach($rooms as $room)
                            <li class="list-group-item border-top-0 border-left-0 border-right-0">
                                <a href="#" wire:click.prevent="switchRoom({{ $room->id }})">#{{ $room->name }}</a>
                            </li>
                        @endforeach
                        <li
                            class="list-group-item border-bottom-0 border-left-0 border-right-0 p-2"
                        >
                            <div class="input-group" x-data>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="room-addon">#</span>
                                </div>
                                <input type="text" wire:model="newRoomName" @keydown.enter="@this.call('addRoom')" class="form-control" placeholder="Room name" aria-label="Room name" aria-describedby="room-addon">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                @unless($currentRoom)
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="px-6 py-4 text-muted">
                            Pick a room first.
                        </div>
                    </div>
                @else
                    <div
                        class="card"
                        x-data="{{ json_encode(['messages' => $messages]) }}"
                    >
                        <div class="card-header">
                            <h3>#{{ $currentRoom->name }}</h3>
                        </div>
                        <div class="card-body max-h-full overflow-y-scroll">
                            <div class="messages">
                                <div class="px-6 py-4" x-show="messages.length === 0">
                                    It's been quiet in here...
                                </div>
                                <template x-for="message in messages" :key="message.id">
                                    <div class="media">
                                        <img src="https://placekitten.com/40" class="mr-3" alt="...">
                                        <div class="media-body">
                                            <h5 class="d-inline-block"><span x-text="message.user.name"></span>: </h5>
                                            <span x-text="message.content"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input">
                                <label for="message-field" class="sr-only">Message</label>
                                <input id="message-field" type="text" placeholder="Say something..." class="form-control" />
                            </div>
                        </div>
                    </div>
                @endunless
            </div>
        </div>
    </div>
</div>
