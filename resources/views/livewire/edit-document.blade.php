<div x-data>
    <input
        type="text"
        class="form-control {{ $errors->first('name', 'is-invalid') }} border-0"
        style="font-size: 2em;"
        wire:model.lazy="name"
    />
    <hr>
    @foreach($blocks as $block)
        @livewire('edit-block', $block, key($block->version))
    @endforeach
</div>
