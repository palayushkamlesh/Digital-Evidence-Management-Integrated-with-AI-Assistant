@extends('layouts.master')
@section('styles')
@endsection
@section('content')

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Chain Of Custodies-Create</h5>

      <!-- Vertical Form -->
      <form action="{{route('chainofcustodies-store')}}" method="post" enctype="multipart/form-data"> 
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
                <label for="exampleFormControlInput1" class="form-label">From Users Id</label>
                <select name="from_users_id" id="" class="form-control" >
                    @foreach ($fromusers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
     </div>

     <div class="col-12">
                <label for="exampleFormControlInput1" class="form-label">To Users Id</label>
                <select name="to_users_id" id="" class="form-control" >
                    @foreach ($tousers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
     </div>

      <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Remarks </label>
        <input type="text" name="remarks" class="form-control" id="exampleFormControlInput1" placeholder="Remarks..">
      </div>

       <div class="col-12">
        <label for="exampleFormControlInput1" class="form-label">Action </label>
        <select name="action" id="role" class="form-control">
            <option value="Collected" {{ old('action') == 'Collected' ? 'selected' : '' }}>Collected</option>
            <option value="Transferred" {{ old('action') == 'Transferred' ? 'selected' : '' }}>Transferred</option>
            <option value="Accessed" {{ old('action') == 'Accessed' ? 'selected' : '' }}>Accessed</option>
            <option value="Analyzed" {{ old('action') == 'Analyzed' ? 'selected' : '' }}>Analyzed</option>
            <option value="Archived" {{ old('action') == 'Archived' ? 'selected' : '' }}>Archived</option>
        </select>
      </div>

       <div class="text-center">
                <button type="submit" class="btn btn-primary btn-md" name="submit">Add Chain Of Custodies</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      </form>

    </div>
</div>
    @endsection
    @section('scripts')
    @endsection
    