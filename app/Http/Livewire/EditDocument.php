<?php

namespace App\Http\Livewire;

use App\Block;
use App\Document;
use Livewire\Component;

class EditDocument extends Component
{
    public $document;
    public $blocks;

    protected $listeners = [
        'blocks.created' => 'reloadBlocks',
    ];

    public function mount(Document $document)
    {
        $this->document = $document;
        $this->blocks = $document->blocks;
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
