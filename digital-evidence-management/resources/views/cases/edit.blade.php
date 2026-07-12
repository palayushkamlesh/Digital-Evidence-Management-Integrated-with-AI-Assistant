@extends('layouts.master')
@section('styles')
@endsection
@section('content')


<div class="card">
    <div class="card-body">
      <h5 class="card-title">Cases-Edit</h5>

<form action="{{route('cases-update')}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="id"  value="{{$cases->id}}" >
  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Case No.</label>
    <input type="text" name="case_number"  value="{{$cases->case_number}}" placeholder="647843296">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title"  value="{{$cases->title}}" placeholder="Title">
  </div>

   <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Description</label>
    <input type="text" name="description"  value="{{$cases->description}}" placeholder="Description">
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Priority</label>
    <select name="priority" id="role" class="form-control">
        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
    </select>
    </select>
  </div>

  <div class="col-12">
    <label for="exampleFormControlInput1" class="form-label">Status</label>
    <select name="status" id="role" class="form-control">
        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
        <option value="investigating" {{ old('status') == 'investigating' ? 'selected' : '' }}>Investigating</option>
        <option value="resolved" {{ old('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
    </select>
    </select>
  </div>

     <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Created By </label>
        <input type="text" name="created_by" class="form-control" id="exampleFormControlInput1" placeholder="Creating Name">
      </div>

    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-md" >update cases</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </div>
  </form><!-- Vertical Form -->

</div>
</div>

@endsection
@section('scripts')
@endsection
    