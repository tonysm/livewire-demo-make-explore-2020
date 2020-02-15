@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Documents</span>
                    <a
                        href="{{ route('documents.store') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('new-doc-form').submit();"
                    >New Document</a>
                </div>

                <form id="new-doc-form" action="{{ route('documents.store') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <div class="card-body">
                    @if(flash()->message)
                        <div class="alert {{ flash()->class ?? 'alert-success' }}" role="alert">
                            {{ flash()->message }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created by</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($documents as $document)
                                <tr>
                                    <td>{{ $document->name }}</td>
                                    <td>{{ $document->creator->name }} <span class="text-muted">({{ $document->created_at->diffForHumans() }})</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No documents yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $documents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
