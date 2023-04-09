@extends('layout')
@section('content')

      <style>
         * {
            font-size: 11px;
         }
         .no-font-size * {
            font-size: 18px;
            padding: 3px 8px 3px 8px;
         }
         .delete-button{
            background-color: #ec4a89;
         }
         @media (max-width: 522px) {
            .col-sm-12 {
               width: 90% !important;
                margin:0 auto;/* to center the card horizontally */
            }
         }
      </style>

      
    <nav class="navbar navbar-light bg-light no-font-size">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
          <form class="d-flex input-group w-auto">
            <input
              type="search"
              class="form-control rounded"
              placeholder="Search"
              aria-label="Search"
              aria-describedby="search-addon"
            />
            {{-- <span class="input-group-text border-0" id="search-addon"> --}}
              {{-- <i class="fas fa-search"></i> --}}
            {{-- </span> --}}
          </form>
        </div>
      </nav>

      <a href="{{route('categories.create')}}" class="m-4 btn btn-outline-primary btn-rounded px-4 rounded-pill no-font-size"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add Category</a>

      <a href="{{route('books.create')}}" class="m-4 btn btn-outline-primary btn-rounded px-4 rounded-pill no-font-size"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add Book</a>

      
      <div class="m-4">
         <div class="row d-flex m-0" style="gap:20px">
            @foreach($books as $book)
            <div class="mb-3 card  col-12 col-sm-12" style="width:230px" >
               <div class="">
                  <div class="mt-3">
                     <div
                        class=""
                        style="
                           background-image: url('/assets/img/books/{{$book->image}}');
                           /* width: 175px;  */
                           /* height: 250px; */
                           background-position: center;
                           background-size: cover;
                           background-repeat: no-repeat;
                           aspect-ratio: 3/4;
                        "
                     >
                        <!-- <img src="" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" /> -->
                     </div>
                  </div>
                  
                  <div class="">
                     <div class="card-body">
                        <h5 class="card-title">{{$book->name}}</h5>
                        <h6><strong>Author:</strong> <span class="text-secondary">{{$book->author}}</span></h6>
                        <h6><strong>Category:</strong> <span class="text-secondary">{{$book->category->category}}</span></h6>
                        <h6><strong>Publication date:</strong> <span class="text-secondary"> {{$book->publication_date}}</span></h6>
                        <p class="card-text"><strong>Description:</strong> {{$book->description}}</p>
                        <h6 class="pb-2"><strong>Price:</strong> <span class="text-secondary"> {{$book->price}}</span></h6>
                        <h6 class="pb-2"><strong>Quantity:</strong> <span class="text-secondary"> {{$book->quantity}}</span></h6>

                        <form action="{{route('books.destroy',$book->id)}}" method="POST">
                           <a class="btn btn-success text-white" href="{{route('sales.create',$book->id)}}">buy now</a>
                           <a  class="btn btn-warning text-white"href="{{route('books.edit',$book->id)}}">Edit</a>
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger delete-button">Delete</button>
                        </form>
                        
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
{{-- 
            <div class="mb-3 col-lg-4 col-md-6 card" style="max-width: 420px">
               <div class="row g-0">
                  <div
                     class="col-md-4"
                     style="
                        background-image: url('https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp');
                        height: 200px;
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
                     "
                  >
                     <!-- <img src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" /> -->
                  </div>
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <h6><strong>Author:</strong> <span class="text-secondary">drakslair</span></h6>
                        <h6><strong>Category:</strong> <span class="text-secondary">drakslair</span></h6>
                        <h6><strong>Publication date:</strong> <span class="text-secondary"> 11/2/2003</span></h6>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <h6 class="pb-2"><strong>Price:</strong> <span class="text-secondary"> 50 DH</span></h6>
                        <button type="button" class="btn btn-danger" style="background-color: #ec4a89">Delete</button>
                        <button type="button" class="btn btn-warning text-white">Edit</button>
                     </div>
                  </div>
               </div>
            </div>--}}


  {{-- Categories table --}}
  <div class="container">
   <div class="table-responsive">
      <table class="table no-font-size" style="width:400px;text-align:center">
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
             <form action="{{ route('categories.destroy',$Category->id) }}" method="POST" style="text-align:end">
            
                 <a class="btn btn-warning text-white" href="{{ route('categories.edit',$Category->id) }}">Edit</a>
                 @csrf
                 @method('DELETE')
    
                 <button type="submit" class="btn btn-danger delete-button">Delete</button>
             </form>
         </td>
         </tr>
         
         @endforeach
       </tbody>
     </table>
    </div>
  </div>
 

  @endsection
       
        

        


