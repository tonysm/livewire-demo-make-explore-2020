<div>
    <h1>{{ $document->name }}</h1>

    @foreach($blocks as $block)
        @livewire('edit-block', $block, key($block->version))
    @endforeach
</div>
