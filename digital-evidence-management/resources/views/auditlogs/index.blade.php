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
           
        </div>
        <div class="card-body">


            <table class="table" style="display: inline-block; overflow: auto;">
                <thead>
                    <tr>
                         <th>ID</th>
                         <th>User</th>
                         <th>Action</th>
                         <th>Module</th>
                         <th>Description</th>
                         <th>IP Address</th>
                         <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                      @forelse($auditlogs as $log)

                <tr>

                    <td>{{ $log->id }}</td>

                    <td>
                        {{ $log->users ? $log->users->name : 'System' }}
                    </td>

                    <td>
                        <span class="badge bg-primary">
                            {{ $log->action }}
                        </span>
                    </td>

                    <td>{{ $log->module }}</td>

                    <td>{{ $log->description }}</td>

                    <td>{{ $log->ip_address }}</td>

                    <td>
                        {{ $log->created_at->format('d-m-Y H:i:s') }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center">
                        No Audit Logs Found
                    </td>
                </tr>

                @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection
@section('scripts')
@endsection
