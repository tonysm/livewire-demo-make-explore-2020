<div>
    @if($block->position === 0)
        <div>
            <a href="#" wire:click.prevent="addBlockBefore">Add new block here</a>
        </div>
    @endif
    <div>
        <textarea wire:model.lazy="content" class="form-control border-0">{{ $content }}</textarea>
    </div>
    <div>
        <a href="#" wire:click.prevent="addBlockAfter">Add new block here</a>
    </div>
</div>
