<?php

namespace App\Http\Livewire;

use App\Document;
use App\Events\DocumentWasRenamed;
use Livewire\Component;

class EditDocument extends Component
{
    public $documentId;
    public $name;

    public function mount(Document $document)
    {
        $this->documentId = $document->id;
        $this->name = $document->name;
    }

    protected function getListeners()
    {
        $documentUpdatedEvent = sprintf('echo-private:documents.%s,DocumentWasRenamed', $this->documentId);
        $blockWasUpdatedEvent = sprintf('echo-private:documents.%s,BlockWasUpdated', $this->documentId);
        $blockWasAddedEvent = sprintf('echo-private:documents.%s,BlockWasAdded', $this->documentId);

        return [
            $documentUpdatedEvent => 'reloadName',
            $blockWasUpdatedEvent => '$refresh',
            $blockWasAddedEvent => '$refresh',
            'new-block' => '$refresh',
        ];
    }

    public function updatedName()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $document = $this->document();
        $document->update(['name' => $this->name]);

        broadcast(new DocumentWasRenamed($document))->toOthers();
    }

    private function document(): Document
    {
        return Document::findOrFail($this->documentId);
    }

    public function reloadName()
    {
        $this->name = $this->document()->name;
    }

    public function render()
    {
        return view('livewire.edit-document', [
            'blocks' => $this->document()->blocks()->get(),
        ]);
    }
}
