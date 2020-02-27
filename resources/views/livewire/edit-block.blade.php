<div>
    @if($currentPosition === 0)
        <div class="opacity-0 hover:opacity-100 transition">
            <a href="#" wire:click.prevent="addBlockBefore">Add new block here</a>
        </div>
    @endif
    <div
        contenteditable="true"
        x-data
        x-ref="input"
        x-init="$refs.input.addEventListener('input', window._.debounce(function () {
            @this.set('content', $refs.input.innerText);
        }, 600))"
    >{{ $content }}</div>
    <div class="opacity-0 hover:opacity-100 transition">
        <a href="#" wire:click.prevent="addBlockAfter">Add new block here</a>
    </div>
</div>
