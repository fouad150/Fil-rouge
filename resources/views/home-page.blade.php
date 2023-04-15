@extends('layout')
@section('content')

<style>
   * {
      font-size: 11px;
   }
   body {
      background-color: #f5f7fa;
   }
   .no-font-size * {
      font-size: 16px;
      /* padding: 3px 8px 3px 8px; */
   }
   .delete-button{
      background-color: #ec4a89;
   }
   .table th, .table td, .table button , .table a{
      font-size: 14px;
   }
   @media (max-width: 522px) {
      .col-sm-12 {
         width: 90% !important;
          margin:0 auto;/* to center the card horizontally */
      }
   }

</style>

       <!-- BEGIN Header -->
   <header class="no-font-size" id="header">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark p-md-4" style="background-color: #1c2331">
         <div class="container">
            <div class="d-flex">
               <img src="assets/img/other/brand.png" class="img-logo pe-4" alt="Logo" style="width:50px" />
               <a href="{{route('home-page')}}" class="navbar-brand"><strong>ONLINE-LIBRARY</strong></a>
            </div>

            <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle Navbar">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
               <div class="mx-auto"></div>
               
               <ul class="navbar-nav text-center d-flex align-items-center">
                  <li class="nav-item">
                     <a href="{{route('books.index')}}" class="nav-link text-white">Admin</a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link text-white">Contact</a>
                  </li>
                  {{-- <li>
                     <!-- basket -->
                     <a href="basket.php" class="position-relative nav-link text-white ">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                        <span class="position-absolute end-0 top-0 text-white font-weight-bold w-50 rounded-circle" style="background-color: #6351ce;">0</span>
                     </a>
                  </li> --}}

                  {{-- search input --}}
                  <form action="{{route('search-book')}}" method="POST" class="input-group me-2 ms-2" style="height:34px">
                     @csrf
                     @method('POST')
                     <div class="form-outline">
                       <input type="search" id="form1" class="form-control" placeholder="Search" name='searched_book'/>
                       <label class="form-label" for="form1">Search</label>
                     </div>
                     <button type="submit" class="btn btn-secondary" style="height:34px">
                       <i class="fas fa-search"></i>
                     </button>
                   </form>

                  <!-- begin User //-->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.freepik.com/free-photo/confident-attractive-caucasian-guy-beige-pullon-smiling-broadly-while-standing-against-gray_176420-44508.jpg?w=996&t=st=1681144811~exp=1681145411~hmac=826d32da2e8b5c711c819e5e65c3351d3e78864008a9b44662cdfb42513dc8df" class="rounded-circle" width="30" height='28' alt="Portrait of a Woman" loading="lazy" />
                        <span class="ps-2 text-white">
                            @if(auth()->check())
                                {{Auth::user()->name}}
                            @else
                                Visitor
                            @endif
                        </span>
                     </a>

                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                           <a class="dropdown-item" href="{{route('sales.index')}}">Previous purchases</a>
                        </li>
                        <li>
                           <x-responsive-nav-link :href="route('profile.edit')" class="dropdown-item">
                              {{ __('Profile') }}
                          </x-responsive-nav-link>
                        </li>
                        <li>
                           {{-- <a class="dropdown-item" href="#">Logout</a> --}}
                           <form method="POST" action="{{ route('logout') }}" >
                              @csrf
          
                              <x-responsive-nav-link :href="route('logout')"
                                      onclick="event.preventDefault();
                                                  this.closest('form').submit();"
                                      class="dropdown-item">
                                  {{ __('Log Out') }}
                              </x-responsive-nav-link>
                          </form>
                        </li>
                     </ul>
                  </li>
                  <!-- end User -->
               </ul>
            </div>
         </div>
      </nav>
   </header>
   <!-- END Header -->


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
      {{-- books cards --}}
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
                        <h6 class="pb-2"><strong>Price:</strong> <span class="text-secondary"> {{$book->price}} MAD</span></h6>
                        <h6 class="pb-2"><strong>Quantity:</strong> <span class="text-secondary"> {{$book->quantity}}</span></h6>

                           <a class="btn btn-success text-white" href="{{route('sales.show',$book->id)}}" style="    background-color: #57cd3f;border-color: #57cd3f;"><strong>buy now</strong></a>
                        
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
{{-- 
            <-- class="mb-3 col-lg-4 col-md-6 card" style="max-width: 420px">
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
            --}}

 
    <!-- BEGIN footer -->
    <footer class="text-center text-lg-start text-white no-font-size mt-4" style="background-color: #1c2331">
      <!-- Social media -->
      <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
         <!-- Left -->
         <div class="me-5">
            <span>Get connected with us on social networks:</span>
         </div>
         <!-- Left -->
         <!-- Right -->
         <div>
            <a href="" class="text-white me-4 text-decoration-none">
               <i class="bi bi-facebook"></i>
            </a>
            <a href="" class="text-white me-4 text-decoration-none">
               <i class="bi bi-twitter"></i>
            </a>
            <a href="" class="text-white me-4 text-decoration-none">
               <i class="bi bi-google"></i>
            </a>
            <a href="" class="text-white me-4 text-decoration-none">
               <i class="bi bi-instagram"></i>
            </a>
            <a href="" class="text-white me-4 text-decoration-none">
               <i class="bi bi-linkedin"></i>
            </a>
            <a href="" class="text-white me-4 text-decoration-none">
               <i class="bi bi-github"></i>
            </a>
         </div>
         <!-- Right -->
      </section>
      <!-- Social media -->

      <!-- Links -->
      <section>
         <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
               <!-- Grid column -->
               <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold">Company name</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                  <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
               </div>
               <!-- Grid column -->

               <!-- Grid column -->
               <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold">Products</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                  <p>
                     <a href="#!" class="text-white text-decoration-none">MDBootstrap</a>
                  </p>
                  <p>
                     <a href="#!" class="text-white text-decoration-none">MDWordPress</a>
                  </p>
                  <p>
                     <a href="#!" class="text-white text-decoration-none">BrandFlow</a>
                  </p>
                  <p>
                     <a href="#!" class="text-white text-decoration-none">Bootstrap Angular</a>
                  </p>
               </div>
               <!-- Grid column -->

               <!-- Grid column -->
               <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold">Useful links</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                  <p>
                     <a href="#!" class="text-white text-decoration-none">Your Account</a>
                  </p>
                  <p>
                     <a href="#!" class="text-white text-decoration-none">Become an Affiliate</a>
                  </p>
                  <p>
                     <a href="#!" class="text-white text-decoration-none">Shipping Rates</a>
                  </p>
                  <p>
                     <a href="#!" class="text-white text-decoration-none">Help</a>
                  </p>
               </div>
               <!-- Grid column -->

               <!-- Grid column -->
               <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold">Contact</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                  <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                  <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
                  <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                  <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
               </div>
               <!-- Grid column -->
            </div>
            <!-- Grid row -->
         </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
         © 2022 Copyright:
         <a class="text-white text-decoration-none" href="https://mdbootstrap.com/">STAR SQUAD</a>
      </div>
      <!-- Copyright -->
   </footer>
   <!-- END footer -->

  @endsection