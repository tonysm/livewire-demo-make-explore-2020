<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index()
    {
        return view('documents.index', [
            'documents' => Document::query()->with(['creator'])->latest()->paginate(),
        ]);
    }

    public function store(Request $request)
    {
        $document = $request->user()->documents()->create([
            'name' => 'Draft #' . Str::random(6),
        ]);

        return redirect()->route('documents.edit', $document);
    }

    public function edit(Document $document)
    {
        return view('documents.edit', [
            'document' => $document->load(['creator']),
        ]);
    }
}
