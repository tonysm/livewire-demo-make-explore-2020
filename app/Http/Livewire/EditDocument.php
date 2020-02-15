<?php

namespace App\Http\Livewire;

use App\Block;
use App\Document;
use App\Events\DocumentWasRenamed;
use Livewire\Component;

class EditDocument extends Component
{
    public $document;
    public $documentId;
    public $blocks;
    public $name;

    public function mount(Document $document)
    {
        $this->document = $document;
        $this->documentId = $document->id;
        $this->name = $document->name;
        $this->blocks = $document->blocks;
    }

    protected function getListeners()
    {
        $documentUpdatedEvent = sprintf('echo-private:documents.%s,DocumentWasRenamed', $this->documentId);
        $blockWasUpdatedEvent = sprintf('echo-private:documents.%s,BlockWasUpdated', $this->documentId);
        $blockWasAddedEvent = sprintf('echo-private:documents.%s,BlockWasAdded', $this->documentId);

        return [
            $documentUpdatedEvent => 'reloadName',
            $blockWasUpdatedEvent => 'reloadBlocks',
            $blockWasAddedEvent => 'reloadBlocks',
        ];
    }

    public function updatedName()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $this->document->update(['name' => $this->name]);

        broadcast(new DocumentWasRenamed($this->document))->toOthers();
    }

    public function reloadName()
    {
        $this->name = $this->document->name;
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
