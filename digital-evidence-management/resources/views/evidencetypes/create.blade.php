@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">EvidenceTypes-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('evidencetypes-store')}}" method="post" enctype="multipart/form-data"> 
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Description </label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Information">
      </div>

        <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add EvidenceTypes</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
      </div>

      </form>

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    