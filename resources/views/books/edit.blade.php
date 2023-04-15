
@extends('layout')
  
@section('content')

<div class="" style="padding:50px">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="pull-left">
                <h2>Edit New book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.index') }}"> Back</a>
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

    <form action="{{ route('books.update',$Book->id) }}" method="POST" id="form-book" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                  <div class="modal-header">
                      <h5 class="modal-title">book</h5>
                      <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" class="form-control" id="book-name" name="name" value="{{$Book->name}}" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Author</label>
                        <input type="text" class="form-control" id="" name="author" value="{{$Book->author}}" />
                      </div>
            
                     <div class="form-outline">
                        <label class="form-label" for="textAreaExample1">Description</label>
                        <textarea class="form-control" id="textAreaExample1" rows="4" name="description">{{$Book->description}}</textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Puplication date</label>
                        <input type="date" class="form-control" id="" name="publication_date" value="{{$Book->publication_date}}" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" id="" name="price" value="{{$Book->price}}"/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="" name="quantity" value="{{$Book->quantity}}"/>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Category</label>
                          <select class="form-select" id="book-category" name="category_id">
                              <option value="">Please select</option>
                              @foreach($Categories as $Category)
                                 <option value="{{$Category->id}}">{{$Category->category}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="formFile" class="form-label">Add image</label>
                          <input class="form-control" type="file" id="formFile" name="image">
                      </div>
                       {{-- store the origin image --}}
                      <input type="hidden" value="{{$Book->image}}" name="origin_image">

                  </div>
                  <div class="modal-footer">
                      <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                      <button type="submit" name="update" class="btn btn-warning task-action-btn text-white" id="book-update-btn">Update</button>
                
                  </div>
       </form>
</div>

@endsection
{{--  --}}

