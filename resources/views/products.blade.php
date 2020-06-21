@extends('master')

@section('main-content')

   <!-- Hero Section-->
   <section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
          <h1>{{$products[0]->ctitle}} Collection</h1>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a></li>
          <li class="breadcrumb-item active">{{$products[0]->ctitle}}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div>
    <div class="container">
      <div class="row">
        <!-- Grid -->
        <div class="products-grid col-12 sidebar-none">
          <header class="d-flex justify-content-between align-items-start"><span class="visible-items">Showing <strong>{{$products->count()}} </strong>of <strong>{{$products->total()}} </strong>results</span>

                <select id="sorting" class="bs-select" onchange="location = '?orderBy=' + this.value">
                    <option value="">Choose Your Sorting</option>
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                    <option value="lowest-price">Low Price</option>
                    <option value="heigh-price">High Price</option>
                  </select>

                </header>
          <div class="row">
            <!-- item-->
            @foreach($products as $product)

            <div class="col-lg-4">

                <div class="card card-elegant">
                    <img class="card-img-top img-fluid" src="{{asset('images/' . $product->pimage)}}" width="100%" alt="Card image cap" >
                    <div class="card-block">
                      <h5 class="card-title text-uppercase">{{$product->ptitle}}</h5>
                      <p class="product-text text-justify">
                         <b>Size:</b> {{$product->psize}}
                         <b>Weight:</b>  {{$product->pweight}} G
                        <br>
                        <div style="font-size: 1.4rem" class="mt-2 product-text text-purple"><b>Price: </b>{{$product->pprice}}$</div>
                        <a href="{{url('shop/' . $product->curl . '/' . $product->purl)}}" class=" mt-2 btn btn-link2  text-uppercase hvr-grow ml-2"><i class="icon-search"></i> More Details</a>
                    </p>
@if(! Cart::get($product->id))
<button data-pid={{$product->id}} type="button" class=" btn btn-link text-uppercase hvr-grow add-to-cart"><i class="icon-cart"></i> Add To Cart</button>
@else
<button disabled="disabled" type="button" class=" btn btn-link text-uppercase add-to-cart"> In Cart</button>
@endif

                    </div>
                  </div>

            </div>

            @endforeach
        <!-- / item End-->
          </div>
        <div class="d-flex justify-content-center"> {{$ppagination}}</div>
        </div>
        <!-- / Grid End-->
      </div>
    </div>
  </div>



@endsection
