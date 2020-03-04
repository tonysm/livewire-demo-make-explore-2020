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
                <div class="card border-0">
                    <div class="card-header border border-gray-100">
                        <h5>Rooms</h5>
                    </div>

                    <div class="list-group">
                        <a class="list-group-item rounded-0 list-group-item-action active" href="#">#general <span class="badge badge-light">4</span></a>
                        <a class="list-group-item list-group-item-action" href="#">#backend</a>
                        <div class="list-group-item">
                            <div>
                                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">#</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="channel-name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Room name...</h5>
                    </div>
                    <div class="card-body" style="height: 500px; overflow-y: scroll">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="https://placekitten.com/40/40" height="40px" class="mr-3" alt="...">
                                <div class="media-body">
                                    <strong>List-based media object</strong>: Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </li>
                            <li class="media">
                                <img src="https://placekitten.com/40/40" height="40px" class="mr-3" alt="...">
                                <div class="media-body">
                                    <strong>List-based media object</strong>: Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div>
                            <label class="sr-only" for="inlineFormTextMessage"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <svg fill="none" height="16px" width="16px" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormTextMessage" placeholder="Say something...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
