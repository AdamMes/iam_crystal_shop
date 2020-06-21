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
                <li class="breadcrumb-item active">Checkout Address</li>
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
                <li class="nav-item"><p class="nav-link active">Checkout Address</p></li>
                <li class="nav-item"><p class="nav-link disabled">Order Review </p></li>
              </ul>
              <div class="tab-content">
                <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                    @csrf()

                  <div id="address" class="active tab-block">
                    <!-- Invoice Address-->
                    <div class="block-header mb-4">
                      <h6>Invoice address                    </h6>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="city" class="form-label">* City</label>
                        <input value="{{old('city')}}" id="city" type="text" name="city" placeholder="Your City Name" class="form-control @error('city') is-invalid @enderror">
                        @error('city')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="street" class="form-label">* Street</label>
                        <input value="{{old('street')}}" id="street" type="text" name="street" placeholder="Your street name" class="form-control @error('city') is-invalid @enderror">
                        @error('street')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                      <div class="form-group col-md-3">
                        <label for="state" class="form-label">State</label>
                        <input value="{{old('state')}}" id="state" type="text" name="state" placeholder="Your state" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label for="zip" class="form-label">ZIP Code</label>
                        <input {{old('zip')}} id="zip" type="text" name="zip" placeholder="ZIP code" class="form-control @error('zip') is-invalid @enderror">
                        @error('zip')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phone" class="form-label">* Phone Number</label>
                        <input value="{{old('phone')}}" id="phone" type="tel" name="phone" placeholder="Your phone number" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                    </div>
                </div>


                <!-- /Invoice Address-->

                <div id="payment-method" class="tab-block">
                    <div  aria-multiselectable="false">
                      <div class="card">
                        <div id="headingOne"  class="card-header">
                          <h6><a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Paypal</a></h6>
                        </div>
                        <div id="collapseOne" aria-labelledby="headingOne" class="collapse">
                          <div class="card-body">
                            <input type="radio" name="paypal" id="payment-method-1" class="radio-template">
                            <label for="payment-method-1"><strong>Continue with Paypal</strong><br><span class="label-description">Click here and pay with paypal. <span class="text-success">(this option are reccomended)</span></span></label>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div id="headingTwo"  class="card-header">
                          <h6><a data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">Pay on delivery</a></h6>
                        </div>
                        <div id="collapseTwo"  aria-labelledby="headingTwo" class="collapse">
                          <div class="card-body">
                            <input type="radio" name="on_delivery" id="payment-method-2" class="radio-template">
                            <label for="payment-method-2"><strong>Pay on Delivery</strong><br><span class="label-description">if you choose this option, before we send the delivery we contact you for guarantee.</span></label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                      <div class="CTAs  flex-column flex-lg-row float-right mt-0">
                          <label for="submit"></label>
                          <button type="submit" name="submit" id="submit" class="btn btn-template wide next ">Continue to order review<i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>

            </form>
            <a href="{{url('shop/cart')}}" class="btn btn-template-outlined wide prev"><i class="fa fa-angle-left"></i>Back to Cart</a>
              </div>





            <div class="col-lg-4 d-flex align-items-center">
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
