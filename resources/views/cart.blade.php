@extends('master')

@section('main-content')


   <!-- Hero Section-->
   <section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
          <h1>Shopping cart</h1><p class="lead text-muted">You currently have {{Cart::getTotalQuantity()}} crystals in your shopping cart</p>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a></li>
            <li class="breadcrumb-item active">Shopping cart</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  @if($cart)
  <!-- Shopping Cart Section-->
  <section class="shopping-cart">
    <div class="container">
      <div class="basket">
        <div class="basket-holder">
          <div class="basket-header">
            <div class="row">
              <div class="col-5">Product</div>
              <div class="col-2">Price</div>
              <div class="col-2">Quantity</div>
              <div class="col-2">Total</div>
              <div class="col-1 text-center">Remove</div>
            </div>
          </div>
          <div class="basket-body">
            <!-- Product-->

            @foreach($cart as $item)

            <div class="item">
              <div class="row d-flex align-items-center">
                <div class="col-5">
                <div class="d-flex align-items-center"><img src="{{url('')}}/images/{{$item['attributes']['image']}}" alt="..." class="img-fluid">
                    <div class="title">
                    <h5>{{$item['name']}}</h5>
                    </div>
                  </div>
                </div>
            <div class="col-2"><span>$ {{$item['price']}}</span></div>
                <div class="col-2">
                  <div class="d-flex align-items-center">
                    <div class="quantity d-flex align-items-center">
                    <div data-op="dec-btn" data-pid="{{$item['id']}}" class="dec-btn update-cart-btn pl-1">-</div>
                    <input type="text" value="{{$item['quantity']}}" class="quantity-no">
                      <div  data-op="inc-btn" data-pid="{{$item['id']}}" class="inc-btn update-cart-btn">+</div>
                    </div>
                  </div>
                </div>
            <div class="col-2"><span>${{$item['quantity'] * $item['price']}}</span></div>
                <div class="col-1 text-center">
                <a class="remove-item-btn" href="{{url('shop/remove-item/' . $item['id'])}}">
                    <i class="delete fa fa-trash fa-2x text-danger"></i>
                </a>
                </div>
              </div>
            </div>


@endforeach

          </div>
        </div>
      </div>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="CTAs d-flex align-items-center justify-content-center justify-content-md-end flex-column flex-md-row">
          <a href="{{url('shop')}}" class="btn btn-template wide">Continue Shopping</a>
      <a href="{{url('shop/clear-cart')}}" class="btn btn-template-outlined wide">Clear Cart</a>
        </div>
    </div>
  </section>
  <!-- Order Details Section-->
  <section class="order-details no-padding-top">
    <div class="container">
      <div class="row">

        <div class="col">
          <div class="block">
            <div class="block-header">
              <h6 class="text-uppercase">Order Summary</h6>
            </div>
            <div class="block-body">
              <p>Shipping and additional costs are calculated based on values you have entered. also <strong class="text-success">Free Shipping over $300 order</strong></p>
              <ul class="order-menu list-unstyled">
              <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>${{Cart::getTotal()}}</strong></li>
                <li class="d-flex justify-content-between"><span>Shipping and handling</span>
                    <strong>
@if(Cart::getTotal() >= 300)
$0
@else
$15
@endif
                </strong>
            </li>
                <li class="d-flex justify-content-between"><span>Tax</span><strong>${{Cart::getTotal() * 0.07}}</strong></li>

                <li class="d-flex justify-content-between"><span>Total</span>
                    <strong class="text-primary price-total">
                <div style="display: none">{{$num= Cart::getTotal() >= 300 ? 0 : 15}}</div>
                    ${{Cart::getTotal() + Cart::getTotal() * 0.07 + $num}}


                </strong></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center CTAs"><a href="{{url('shop/checkout')}}" class="btn btn-template btn-lg wide">Proceed to checkout<i class="fa fa-long-arrow-right"></i></a></div>
      </div>
    </div>
  </section>
@else

<div class="container">

<div style="margin-top: 100px" class="basket">
    <div class="basket-holder">
      <div class="basket-header">
        <div class="row">
         <div class="col text-center"><strong>No crystals in cart</strong></div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center mt-2">
                <a href="{{url('shop')}}" class="btn btn-template-outlined wide ">Continue Shopping</a>

            </div>
        </div>
      </div>
    </div>

</div>

@endif


@endsection
