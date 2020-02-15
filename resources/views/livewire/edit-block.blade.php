<div>
    @if($block->position === 0)
        <div>
            <a href="#" wire:click.prevent="addBlockBefore">Add new block here</a>
        </div>
    @endif
    <div>
        {{ $block->position }}{{ $block->content }}
    </div>
    <div>
        <a href="#" wire:click.prevent="addBlockAfter">Add new block here</a>
    </div>
</div>
