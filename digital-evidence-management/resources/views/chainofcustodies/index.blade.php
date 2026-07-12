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
            <a href="{{ route('chainofcustodies-create') }}" class="btn btn-primary">Add ChainOfCustodies</a>
        </div>
        <div class="card-body">


            <table class="table" style="display: inline-block; overflow: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EVIDENCE </th>
                         <th>FROM USER</th>
                        <th>TO USER</th>
                        <th>ACTION</th>
                        <th>REMARKS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chainofcustodies as $item)
                        <tr>
                
                            <td>{{ $item->id }}</td>
                            <!-- <td>{{ $item->evidences->evidence_number }}</td> -->
                             <td>{{ optional($item->evidences)->evidence_number }}</td>
                            <td>{{ $item->fromUsers->name }}</td>
                            <td>{{ $item->toUsers->name }}</td>
                            <td>{{ $item->action }}</td>
                            <td>{{ $item->remarks }}</td>
                            
                           <td>
                       
                        <a href="{{ route('chainofcustodies-delete', ['id' => $item->id]) }}" class="bi bi-trash"></a>
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
