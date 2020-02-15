<?php

namespace App\Http\Livewire;

use App\Block;
use App\Document;
use App\Events\BlockWasAdded;
use App\Events\BlockWasUpdated;
use Illuminate\Support\Str;
use Livewire\Component;

class EditBlock extends Component
{
    /** @var Block */
    public $block;
    public $version;
    public $content;

    public function mount(Block $block)
    {
        $this->block = $block;
        $this->version = $block->version;
        $this->content = $block->content;
    }

    public function updatedContent()
    {
        if ($this->block->version === $this->version) {
            $this->block->update([
                'content' => $this->content,
                'version' => $this->version = Str::uuid()->toString(),
            ]);

            broadcast(new BlockWasUpdated($this->block))->toOthers();
        } else {
            $this->version = $this->block->version;
            $this->content = $this->block->content;
        }
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

        broadcast(new BlockWasAdded($this->block))->toOthers();
    }

    public function render()
    {
        return view('livewire.edit-block');
    }
}
