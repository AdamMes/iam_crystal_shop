@extends('master')

@section('main-content')

    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
          <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
              <h1>Checkout</h1><p class="lead">You currently have {{Cart::getTotalQuantity()}} crystal(s) in your cart</p>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
              <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a></li>
                <li class="breadcrumb-item active">Checkout Review</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- Checkout Forms-->
      <section class="checkout">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <ul class="nav nav-pills">
                <li class="nav-item"><p class="nav-link">Checkout Address</p></li>

                <li class="nav-item"><p class="nav-link active">Order Review</p></li>
              </ul>
              <div class="tab-content">
                <div id="order-review" class="tab-block">
                  <div class="cart">
                    <div class="cart-holder">
                      <div class="basket-header">
                        <div class="row">
                          <div class="col-5">Product</div>
                          <div class="col-2">Price</div>
                          <div class="col-3 text-center">Quantity</div>
                          <div class="col-2">Unit Price</div>
                        </div>
                      </div>
                      <div class="basket-body">

                        @foreach($cart as $item)

                        <div class="item">
                          <div class="row d-flex align-items-center">
                            <div class="col-5">
                            <div class="d-flex align-items-center"><img src="{{url('')}}/images/{{$item['attributes']['image']}}" alt="..." class="img-fluid">
                                <div class="title">
                                <h6>{{$item['name']}}</h6>
                                </div>
                              </div>
                            </div>
                        <div class="col-2"><span>$ {{$item['quantity'] * $item['price']}}</span></div>
                            <div class="col-3">
                              <div class="d-flex justify-content-center">
                                <div class="quantity d-flex align-items-center">
                                <div data-op="dec-btn" data-pid="{{$item['id']}}" class="dec-btn update-cart-btn pl-1">-</div>
                                <input type="text" value="{{$item['quantity']}}" class="quantity-no">
                                  <div  data-op="inc-btn" data-pid="{{$item['id']}}" class="inc-btn update-cart-btn">+</div>
                                </div>
                              </div>
                            </div>
                        <div class="col-2 text-center"><span>${{$item['price']}}</span></div>

                          </div>
                        </div>


            @endforeach




                      </div>
                    </div>
                <div class="total row"><span class="col-md-10 col-2">Total</span><span class="col-md-2 col-10 text-primary">${{Cart::getTotal()}}</span></div>
                  </div>
                <div class="CTAs d-flex justify-content-between flex-column flex-lg-row"><a href="{{url('shop/checkout')}}" class="btn btn-template-outlined wide prev"><i class="fa fa-angle-left"></i>Back to Checkout Address</a>
                    <form action="" method="POST">
                        @csrf()
                        <button type="submit" name="submit" class="btn btn-template ">Finish Order<i class="fa fa-angle-right"></i></button></div>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="block-body order-summary">
                <h6 class="text-uppercase">Order Summary</h6>
                <p>Shipping and additional costs are calculated based on values you have entered</p>
                <ul class="order-menu list-unstyled">
                  <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>${{Cart::getTotal()}}</strong></li>
                  <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>
                      @if(Cart::getTotal() >= 300)
                    $0
                    @else
                    $15
                    @endif
                </strong></li>
                  <li class="d-flex justify-content-between"><span>Tax</span><strong>${{Cart::getTotal() * 0.07}}</strong></li>
                  <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total"> <div style="display: none">{{$num= Cart::getTotal() >= 300 ? 0 : 15}}</div>
                    ${{Cart::getTotal() + Cart::getTotal() * 0.07 + $num}}</strong></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection
