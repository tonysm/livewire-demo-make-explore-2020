@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(flash()->message)
                    <div class="alert {{ flash()->class ?? 'alert-success' }}" role="alert">
                        {{ flash()->message }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @livewire('chat-rooms-list', ['currentRoom' => $currentRoom])
            </div>
            <div class="col-md-8">
                @if($currentRoom)
                    <div
                        class="card"
                        x-data="{{ json_encode(['current_room' => $currentRoom, 'messages' => $messages]) }}"
                        x-init="
                            Echo.private(`rooms.${current_room.id}.messages`)
                                .listen('NewChatMessage', function (e) {
                                    messages.push(e.chatMessage);
                                });
                        "
                    >
                        <div class="card-header">
                            <h5 x-text="`#${current_room.name}`"></h5>
                        </div>
                        <div class="card-body" style="height: 500px; overflow-y: scroll">
                            <ul class="list-unstyled">
                                <template x-for="message in messages" :key="message.id">
                                    <li class="media">
                                        <img src="https://placekitten.com/40/40" height="40px" class="mr-3" alt="...">
                                        <div class="media-body">
                                            <strong x-text="message.user.name"></strong>: <span x-text="message.content"></span>
                                        </div>
                                    </li>
                                </template>

                                <template x-if="messages.length === 0">
                                    <li class="media">
                                        <div class="media-body">
                                            It's been quiet in here...
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="card-footer">
                            @livewire('chat-room-input', ['room' => $currentRoom])
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            Pick a room to get starter (or create one if there is none)...
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
