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
            <a href="{{ route('evidencefiles-create') }}" class="btn btn-primary">Add EvidenceFiles</a>
        </div>
        <div class="card-body">


            <table class="table" style="display: inline-block; overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EVIDENCE ID</th>
                        <th>FILE NAME</th>
                        <th>FILE TYPE</th>
                        <th>FILE SIZE</th>
                         <th>SHA-256</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evidencefiles as $item)
                        <tr>
                
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->evidences_id }}</td>
                            <td>{{ $item->file_name }}</td>
                            <td>{{ $item->file_type }}</td>
                            <td>{{ $item->file_size }}</td>
                            <td>
                                <small>
                                     {{ Str::limit($item->sha256_hash,25) }}
                                </small>
                            </td>    
                            <td>
                                <a href="{{ asset('storage/'.$item->file_path) }}"
                                   target="_blank"
                                   class="btn btn-primary">
                                   View File
                                </a>
                            </td>     
                            <td>
                                <a href="{{ route('evidencefiles-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>

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
