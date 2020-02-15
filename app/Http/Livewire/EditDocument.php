<?php

namespace App\Http\Livewire;

use App\Block;
use App\Document;
use Livewire\Component;

class EditDocument extends Component
{
    public $document;
    public $blocks;
    public $name;

    protected $listeners = [
        'blocks.created' => 'reloadBlocks',
    ];

    public function mount(Document $document)
    {
        $this->document = $document;
        $this->name = $document->name;
        $this->blocks = $document->blocks;
    }

    public function updatedName()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $this->document->update(['name' => $this->name]);
    }

    public function reloadBlocks()
    {
        $this->blocks = $this->document->blocks()->get();
    }

    public function render()
    {
        return view('livewire.edit-document');
    }
}
