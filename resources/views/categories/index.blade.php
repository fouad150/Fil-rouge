
@extends('layout')
@section('content')

<style>
  
   body {
      background-color: #f5f7fa;
   }
   .table{
    margin: 0 auto;
    width:550px;
    text-align:center;
   }
   .delete-button{
      background-color: #ec4a89;
   }
   /* .no-font-size * {
      font-size: 16px; */
      /* padding: 3px 8px 3px 8px; */
   /* } */
   
   @media (max-width: 522px) {
      .col-sm-12 {
         width: 90% !important;
          margin:0 auto;/* to center the card horizontally */
      }
      .buttons-parent{
        width: 95vw!important;
      }
   }

</style>
    

      <div class="container mt-4 " >
        <div class="d-flex justify-content-between buttons-parent mb-2" style="width: 43vw;margin: 0 auto;">
            <a href="{{route('categories.create')}}" class=" btn btn-primary btn-rounded px-4 rounded-pill no-font-size" style="font-size:14px;"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add Category</a>
            <a class="btn btn-success" href="{{ route('books.index') }}"> Back</a>
        </div>
        

     {{-- return response --}}
        @if ($message = Session::get('success'))
      <div class="container-fluid mt-4">
         <div class="alert alert-success no-font-size">
            <p>{{ $message }}</p>
        </div>
      </div>
      @endif

      @if ($message = Session::get('danger'))
      <div class="container-fluid mt-4">
         <div class="alert alert-danger no-font-size">
            <p>{{ $message }}</p>
        </div>
      </div>    
      @endif

      @if ($message = Session::get('warning'))
      <div class="container-fluid mt-4">
         <div class="alert alert-warning no-font-size">
            <p>{{ $message }}</p>
        </div>
      </div>     
      @endif
    
        {{-- Categories table --}}
        
          <div class="table-responsive">
             <table class="table mt-4">
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
       
        

        


