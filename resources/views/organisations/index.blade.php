@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>Organisations</span>
                    <a href="{{ route('organisations.create') }}">New Organisation</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>City/Country</th>
                                <th>Postal Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($organisations as $organisation)
                                <tr>
                                    <td>{{ $organisation->name }}</td>
                                    <td>{{ "{$organisation->city}/{$organisation->country}" }}</td>
                                    <td>{{ $organisation->postal_code }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No organisations yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $organisations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
