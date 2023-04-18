{{-- @extends('layout')
@section('content') --}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Facture</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
  
        <div class="container col-md-5 col-lg-4 order-md-last" style="margin-top:80px">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-center lh-sm">
                    <div class="d-flex justify-content-center">
                        <h2 class="my-0 text-center">Facture</h2>
                        <small class="text-muted"></small>
                    </div>
                    <span class="text-muted"></span>
                </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Book</h6>
                  <small class="text-muted">{{$bought_book->description}}</small>
                </div>
                <span class="text-muted">{{$bought_book->name}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Author</h6>
                  <small class="text-muted">{{$bought_book->description}}</small>
                </div>
                <span class="text-muted">{{$bought_book->author}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Date</h6>
                  <small class="text-muted">{{$bought_book->description}}</small>
                </div>
                <span class="text-muted">{{now()->format('Y-m-d H:i')}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Price</h6>
                  <small class="text-muted">{{$bought_book->description}}</small>
                </div>
                <span class="text-muted">{{$bought_book->price}}MAD</span>
              </li>
              <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                  <h6 class="my-0">Promo code</h6>
                  <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">−5MAD</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <h6>Total</h6>
                <span> ({{$bought_book->price}}MAD)</span>
              </li>
            </ul>
          </div> 
    
        </body>
        </html>
{{-- @endsection --}}