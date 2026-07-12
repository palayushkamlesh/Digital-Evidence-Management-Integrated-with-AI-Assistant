@extends('layouts.master')
@section('styles')
@endsection
@section('content')
    <div class="card">
        @if (Session::get('success'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="card-header">
            <a href="{{ route('evidences-create') }}" class="btn btn-primary">Add Evidences</a>
        </div>
        <div class="card-body">


            <table class="table" style="display: inline-block; overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EVIDENCE NUMBER</th>
                        <th>CASE</th>
                         <th>EVIDENCE TYPE</th>
                        <th>TITLE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evidences as $item)
                        <tr>
                
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->evidence_number }}</td>
                            <td>{{ $item->cases->title }}</td>
                            <td>{{ $item->evidencetypes->name }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->status }}</td>
                           <td>
                        <a href="{{ route('evidences-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('evidences-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
                    </td>
                    
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('scripts')
@endsection
