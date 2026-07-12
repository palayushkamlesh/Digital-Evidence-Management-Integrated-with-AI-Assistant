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
            <a href="{{ route('cases-create') }}" class="btn btn-primary">Add Cases</a>
        </div>
        <div class="card-body">


            <table class="table" style="display: inline-block; overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CASE NO</th>
                        <th>TITLE</th>
                         <th>DESCRIPTION</th>
                        <th>PRIORITY</th>
                        <th>STATUS</th>
                        <th>CREATED BY</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $item)
                        <tr>
                
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->case_number }}</td>
                            <td>{{ $item->title }}</td>
                             <td>{{ $item->description }}</td>
                            <td>{{ $item->priority }}</td>
                             <td>{{ $item->status }}</td>
                            
                              <td>{{ $item->user?->name ?? 'N/A' }}</td>
                           <td>
                        <a href="{{ route('cases-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('cases-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
