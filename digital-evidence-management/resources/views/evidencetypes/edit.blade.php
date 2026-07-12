@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">EvidenceTypes-Edit</h5>

<form action="{{route('evidencetypes-update')}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id"  value="{{$evidencetypes->id}}" >
  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name"  value="{{$evidencetypes->name}}" placeholder="Name">
  </div>

  

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Description</label>
    <input type="text" name="description"  value="{{$evidencetypes->description}}" placeholder="Information">
  </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update evidencetypes</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>

</div>
</div>

@endsection
@section('scripts')
@endsection
    