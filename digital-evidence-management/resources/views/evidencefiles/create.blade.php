@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Evidence Files-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('evidencefiles-store')}}" method="post" enctype="multipart/form-data"> 
        @csrf

          <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">Evidence Id</label>
                <select name="evidences_id" id="" class="form-control" >
                    @foreach ($evidences as $item)
                        <option value="{{ $item->id }}">{{ $item->evidence_number }}</option>
                    @endforeach
                </select>
          </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">File Name</label>
        <input type="text" name="file_name" class="form-control" id="exampleFormControlInput1" placeholder="Log File/Folder">
      </div>

      <div class="col-12">
         <label>Upload File</label>
         <input type="file" name="original_name" class="form-control" placeholder="Drag/Drop file here">
      </div>
     
       <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add Evidence Files</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      </form>

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    