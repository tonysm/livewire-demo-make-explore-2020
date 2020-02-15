<?php

namespace App\Http\Livewire;

use App\Block;
use App\Document;
use Illuminate\Support\Str;
use Livewire\Component;

class EditBlock extends Component
{
    public $block;

    public function mount(Block $block)
    {
        $this->block = $block;
    }

    public function addBlockBefore()
    {
        $this->createBlock($this->block->position);
    }

    public function addBlockAfter()
    {
        $this->createBlock($this->block->position + 1);
    }

    private function createBlock(int $position)
    {
        $this->block->document->blocks()
            ->where('position', '>=', $position)
            ->each(function (Block $block) {
                $block->update([
                    'position' => $block->position + 1,
                    'version' => Str::uuid()->toString(),
                ]);
            });

        $this->block->document->blocks()->create([
            'position' => $position,
            'content' => 'New block ' . Str::random(3),
            'version' => Str::uuid()->toString(),
        ]);

        $this->emit('blocks.created');
    }

    public function render()
    {
        return view('livewire.edit-block');
    }
}
