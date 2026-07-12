@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Evidences-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('evidences-store')}}" method="post" enctype="multipart/form-data"> 
        @csrf

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Evidence Number</label>
        <input type="text" name="evidence_number" class="form-control" id="exampleFormControlInput1" placeholder="34734180914">
      </div>

       <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Case Id</label>
                <select name="cases_id" id="" class="form-control" >
                    @foreach ($cases as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
     </div>

      <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Evidence Type Id</label>
                <select name="evidencetypes_id" id="" class="form-control" >
                    @foreach ($evidencetypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
     </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Title </label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
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
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add EvidenceTypes</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      </form>

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    