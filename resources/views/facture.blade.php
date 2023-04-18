@extends('layout')
@section('content')
    
        <div class="container col-md-5 col-lg-4 order-md-last" style="margin-top:80px">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-center lh-sm">
                    <div class="d-flex justify-content-center">
                        <h2 class="my-0">Facture</h2>
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
              <a href='{{route('facture',$bought_book->id)}}' type="button" class="btn btn-info text-light"><strong>Print</strong></a>
              <a class="btn btn-light" href="{{ route('home-page') }}" style="background-color:#f2f6f9"><strong>Back</strong></a>
            </ul>
          </div> 

@endsection

{{--  --}}