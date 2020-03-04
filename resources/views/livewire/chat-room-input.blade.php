<form wire:submit.prevent="sendMessage">
    <label class="sr-only" for="inlineFormTextMessage"></label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <svg fill="none" height="16px" width="16px" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
        </div>
        <input
            wire:model="newMessage"
            type="text"
            class="form-control"
            id="inlineFormTextMessage"
            placeholder="Say something..."
        >
    </div>
</form>
