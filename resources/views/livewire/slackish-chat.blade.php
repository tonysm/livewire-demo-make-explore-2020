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
                                <a href="#">#{{ $room->name }}</a>
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
                    <div class="card">
                        <div class="card-header">
                            <h3>#general</h3>
                        </div>
                        <div class="card-body max-h-full overflow-y-scroll">
                            <div class="messages">
                                <div class="media">
                                    <img src="https://placekitten.com/40" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="d-inline-block">Media heading: </h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="https://placekitten.com/40" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="d-inline-block">Media heading: </h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="https://placekitten.com/40" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="d-inline-block">Media heading: </h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
                                <div class="media">
                                    <img src="https://placekitten.com/40" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="d-inline-block">Media heading: </h5>
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                    </div>
                                </div>
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
