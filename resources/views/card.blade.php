@extends('layouts.withcart')

@section('content')

<div class="container">
    <div class="row">
  
        <div class="col-md-8 product-box">

            @foreach ($Cards as $Card)

              @if( Auth::user()->id ==  $Card->user_id)


              @foreach ($CardProducts as $CardProduct)  

                @if(  $Card->product_id ==  $CardProduct->id)
                  <table class="table table-border text-center">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img class="img1" src="/uploads/products/home/{{ $CardProduct->frontimg }}"></td>
                        <td>{{$CardProduct->title}}</td>
                        <td>{{$Card->size}}</td>
                        <td>{{$Card->amount}}</td>
                        <td id="l">{{ $test = $CardProduct->price * $Card->amount}}</td>
                        <td>&#8364;{{ number_format(($test / 100), 2, '.', ',') }}</td>
                        <td>
                          <a href="/card/remove/{{ $Card->id }}" class="btn btn-outline-danger">
                              X
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                @endif

              @endforeach

              @endif

            @endforeach
          </div>


            @if (!empty($Card->id) && Auth::user()->id == $Card->user_id)
            <div class="col-md-4 product-box">

            <table class="table table-border text-center">
              <thead>
              <tr>
                  <th>Total Products</th>
                  <th>Total Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $totalProducts }}</td>
                  <td>&#8364;{{ number_format(($totalPrice / 100), 2, '.', ',') }}</td>

                </tr>
              </tbody>
            </table>
              
              <a href="/checkout/step/"class="mt-3 btn btn-block btn-outline-dark"> Checkout </a> 

            </div>
              @else

              <div class="col-md-12">

              <div class="text-center mt-5">
                <i class="fab fa-angellist" style="font-size: 200px;"></i>
                <h1>Unfortunately, Your Cart Is Empty</h1>
                <h5>Please Add Something In your Cart</h5>
                <a href="/" class="btn btn-outline-dark text-center mt-3">
                  Continue Shopping
                </a>
              </div>

          </div>
            @endif


    </div>
</div>
@endsection
