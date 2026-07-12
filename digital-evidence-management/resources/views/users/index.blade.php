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
            <a href="{{ route('users-create') }}" class="btn btn-primary">Add Users</a>
        </div>
        <div class="card-body">


            <table class="table" style="display: inline-block; overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                         <th>ROLE</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                             <td>{{ $item->role }}</td>
                            <td>{{ $item->password }}</td>
                           <td>
                        <a href="{{ route('users-edit', ['id' => $item->id]) }}" class="bi bi-pencil-square"></a>
                        <a href="{{ route('users-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
