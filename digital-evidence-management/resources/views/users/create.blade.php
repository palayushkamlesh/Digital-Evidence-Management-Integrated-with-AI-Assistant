@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Users-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('users-store')}}" method="post" enctype="multipart/form-data"> 
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Email </label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
      </div>

       <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Role </label>
        <select name="role" id="role" class="form-control">
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="investigator" {{ old('role') == 'investigator' ? 'selected' : '' }}>Investigator</option>
            <option value="officer" {{ old('role') == 'officer' ? 'selected' : '' }}>Officer</option>
            <option value="auditor" {{ old('role') == 'auditor' ? 'selected' : '' }}>Auditor</option>
        </select>
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Password </label>
        <input type="number" name="password" class="form-control" id="exampleFormControlInput1" placeholder="*********">
      </div>

      <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add User</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
      </div>

      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    