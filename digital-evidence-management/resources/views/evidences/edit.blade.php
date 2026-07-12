@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Evidences-Edit</h5>

<form action="{{route('evidences-update')}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id"  value="{{$evidences->id}}" >
  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Evidence Number</label>
    <input type="text" name="evidence_number"  value="{{$evidences->evidence_number}}" placeholder="34734180914">
  </div>

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Evidence Types</label>
    <input type="text" name="evidencetypes_id"  value="{{$evidences->evidencetypes_id}}" placeholder="Logs...">
  </div>

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title"  value="{{$evidences->title}}" placeholder="Title">
  </div>

   <!-- <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">File Name</label>
    <input type="text" name="file_name"  value="{{$evidences->file_name}}" placeholder="Name of your file">
  </div>

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">File Path</label>
    <input type="text" name="file_path"  value="{{$evidences->file_path}}" placeholder="Location of your file">
  </div>

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">File Size</label>
    <input type="text" name="file_size"  value="{{$evidences->file_size}}" placeholder="kb">
  </div> -->

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Hash_sha256</label>
    <input type="text" name="hash_sha256"  value="{{$evidences->hash_sha256}}" placeholder="0000000111111111000">
  </div>

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Evidence Number</label>
    <input type="text" name="evidence_number"  value="{{$evidences->evidence_number}}" placeholder="34734180914">
  </div>

   <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Status </label>
        <select name="status" id="role" class="form-control">
            <option value="Collected" {{ old('status') == 'Collected' ? 'selected' : '' }}>Collected</option>
            <option value="Under Analysis" {{ old('status') == 'Under Analysis' ? 'selected' : '' }}>Under Analysis</option>
            <option value="Archived" {{ old('status') == 'Archived' ? 'selected' : '' }}>Archived</option>
        </select>
      </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update evidences</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form>

</div>
</div>

@endsection
@section('scripts')
@endsection
    