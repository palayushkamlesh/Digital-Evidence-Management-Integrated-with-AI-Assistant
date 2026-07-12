@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Users-Edit</h5>

<form action="{{route('users-update')}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id"  value="{{$users->id}}" >
  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name"  value="{{$users->name}}" placeholder="Name">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Email </label>
    <input type="email" name="email"  value="{{$users->email}}" placeholder="name@example.com">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Role</label>
    <select name="role" id="role" class="form-control">
        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="number" name="password"  value="{{$users->password}}" placeholder="*****">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update users</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    