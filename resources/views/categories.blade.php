@extends('master')

@section('main-content')

<section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
          <h1>Shop</h1><p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="categories">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase">Our Categories Collection</h2>
      </header>
      <div class="row text-left">

      @if ($categories)


  @foreach ($categories as $category)


  <div class="col-lg-6 col-xl-4">

       <div class="card card-elegant">
               <img class="card-img-top img-fluid" src="{{asset('images/' . $category['cimage'])}}" width="100%" alt="Card image cap" >
               <div class="card-block">
                 <h5 class="card-title text-uppercase">{{$category['ctitle']}}</h5>
                 <p style="min-height: 250px" class="card-text text-justify">{{strip_tags($category['carticle'])}}</p>
                 <a href="{{url('shop/' . $category['curl'])}}" class="btn btn-link text-uppercase hvr-grow">View Products</a>
               </div>
             </div>

</div>


  @endforeach
@else
<div class="col">
    <p><i>No Categories Available ...</i></p>
</div>
      @endif


      </div>
    </div>
  </section>

@endsection
