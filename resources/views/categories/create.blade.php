
@extends('layout')
  
@section('content')

<div class="" style="padding:100px">
    <div class="row"  style="padding: 0px 22px 0px 22px;">
        <div class="col-lg-12 ">
            <div class="pull-left">
                <h2>Add New Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>
       
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
       
    <form action="{{ route('categories.store') }}" method="POST" id="form-category" enctype="multipart/form-data">
        @csrf
      
           <div class="modal-body">
    
               <div class="mb-3">
                   <label class="form-label">Category</label>
                   <input type="text" class="form-control" id="" name="category" />
               </div>
        
           </div>
           <div class="modal-footer">
               <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
               {{-- <button type="submit" name="delete" class="btn btn-danger task-action-btn" id="book-delete-btn">Delete</button>
               <button type="submit" name="update" class="btn btn-warning task-action-btn" id="book-update-btn">Update</button> --}}
                <button type="submit" name="save" class="btn btn-primary task-action-btn" id="category-save-btn">Save</button>
           </div>
       </form>
</div>

@endsection


