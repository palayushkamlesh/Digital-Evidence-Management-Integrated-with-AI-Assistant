@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Cases-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('cases-store')}}" method="post" enctype="multipart/form-data"> 
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Case Number</label>
        <input type="text" name="case_number" class="form-control" id="exampleFormControlInput1" placeholder="5483849494">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Title </label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Description </label>
        <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Description">
      </div>

       <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Priority </label>
        <select name="priority" id="role" class="form-control">
            <option value="low" {{ old('role') == 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ old('role') == 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ old('role') == 'high' ? 'selected' : '' }}>High</option>
        </select>
      </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Status </label>
        <select name="status" id="role" class="form-control">
            <option value="open" {{ old('role') == 'open' ? 'selected' : '' }}>Open</option>
            <option value="investigating" {{ old('role') == 'investigating' ? 'selected' : '' }}>Investigating</option>
            <option value="resolved" {{ old('role') == 'resolved' ? 'selected' : '' }}>Resolved</option>
            <option value="closed" {{ old('role') == 'closed' ? 'selected' : '' }}>Closed</option>
        </select>
      </div>

       <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Created By</label>
                <select name="created_by" id="" class="form-control" >
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
          </div>

      <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add Cases</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
      </div>

      </form><!-- Vertical Form -->

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    