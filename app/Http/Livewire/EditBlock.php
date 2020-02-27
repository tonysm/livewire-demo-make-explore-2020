<?php

namespace App\Http\Livewire;

use App\Block;
use App\Events\BlockWasAdded;
use App\Events\BlockWasUpdated;
use Illuminate\Support\Str;
use Livewire\Component;

class EditBlock extends Component
{
    public $blockId;
    public $version;
    public $content;
    public $currentPosition;

    public function mount(Block $block)
    {
        $this->blockId = $block->id;
        $this->version = $block->version;
        $this->content = $block->content;
        $this->currentPosition = $block->position;
    }

    private function block(): Block
    {
        return Block::findOrFail($this->blockId);
    }

    public function updatedContent()
    {
        $block = $this->block();

        if ($block->version === $this->version) {
            $block->update([
                'content' => $this->content,
                'version' => $this->version = Str::uuid()->toString(),
            ]);

            broadcast(new BlockWasUpdated($block))->toOthers();
        } else {
            $this->version = $block->version;
            $this->content = $block->content;
            $this->currentPosition = $block->position;
        }
    }

    public function addBlockBefore()
    {
        $this->createBlock($this->currentPosition);
    }

    public function addBlockAfter()
    {
        $this->createBlock($this->currentPosition + 1);
    }

    private function createBlock(int $position)
    {
        $document = $this->block()->document;

        $document->blocks()
            ->where('position', '>=', $position)
            ->increment('position');

        $block = $document->blocks()->create([
            'position' => $position,
            'content' => 'New block ' . Str::random(6),
            'version' => Str::uuid()->toString(),
        ]);

        broadcast(new BlockWasAdded($block))->toOthers();
        $this->emit('new-block', $block);
    }

    public function render()
    {
        return view('livewire.edit-block');
    }
}
