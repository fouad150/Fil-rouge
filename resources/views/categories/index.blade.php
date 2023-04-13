@extends('layout')
@section('content')

<style>
   
   body {
      background-color: #f5f7fa;
   }
   .table{
    margin: 0 auto;
    width:422px;
    text-align:center;
   }
   .delete-button{
      background-color: #ec4a89;
   }
   /* .table th, .table td, .table button , .table a{
      font-size: 14px;
   } */

</style>

<div class="container">
    <a href="{{route('categories.create')}}" class="m-4 btn btn-primary btn-rounded px-4 rounded-pill no-font-size"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add Category</a>


    {{-- Categories table --}}
    
      <div class="table-responsive">
         <table class="table">
          <thead class="table-primary">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
             <?php $i=0;?> 
             @foreach($Categories as $Category)
            <tr>
              <th scope="row">{{++$i}}</th>
              <td>{{$Category->category}}</td>
              <td>
                <form action="{{ route('categories.destroy',$Category->id) }}" method="POST" style="text-align:end;" class="d-flex justify-content-center">
                    
                    <a class="btn btn-warning text-white" href="{{ route('categories.edit',$Category->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
       
                    <button type="submit" class="btn btn-danger delete-button ms-2" style="margin-right:-28px">Delete</button>
                </form>
            </td>
            </tr>
            
            @endforeach
          </tbody>
        </table>
       </div>
    
</div>

@endsection