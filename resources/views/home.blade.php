@extends('master')

@section('main-content')

  <!-- Hero Section-->
  <section class="hero hero-home no-padding">
    <!-- Hero Slider-->
    <div class="owl-carousel owl-theme hero-slider">
      <div style="background: url(images/crystal-3.jpg);" class="item d-flex align-items-center has-pattern">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="mb-4">Wellcome to I AM <br> Online Crystal Shop</h1>
              <a href="{{url('shop')}}" class="btn btn-template wide shop-now">Shop Now<i class="icon-bag"> </i></a>
            </div>
          </div>
        </div>
      </div>
      <div style="background: url(images/crystal-5.jpg);" class="item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-white">
              <h2 class="h1">Looking for <br> beautiful present</h2>
              <p class="lead"><strong>You get to the right place</strong></p><a href="{{url('shop')}}" class="btn btn-template wide shop-now">Shop Now<i class="icon-bag">  </i></a>
            </div>
          </div>
        </div>
      </div>
      <div style="background: url(images/crystal-14.jpg);" class="item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-white">
              <h2 class="h1">We have diffrent <br> types of :</h2>
              <ul class="lead">
                <li><strong>Crystals</strong></li>
                <li><strong>Minerals</strong></li>
                <li><strong>Fossils</strong></li>
              </ul>
              <a href="{{url('shop')}}" class="btn btn-template wide shop-now">Shop Now<i class="icon-bag"> </i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section-->
  <section class="categories">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase"><small>Comming Soon...</small>New High Quality Collection</h2>
      </header>
      <div class="row text-left">
        <div class="col-lg-4">
            <div style="background-image: url({{asset('images/high-quality-1.jpg')}});" class="item d-flex align-items-end">
              <div class="content">
                <h3 class="h5">Amazonite & <br> Quartz</h3>
              </div>
            </div></div>
        <div class="col-lg-4">
            <div style="background-image: url({{asset('images/high-quality-2.jpg')}});" class="item d-flex align-items-end">
              <div class="content">
                <h3 class="h5">Rhdchrosite</h3>
              </div>
            </div></div>
        <div class="col-lg-4">
            <div style="background-image: url({{asset('images/high-quality-3.jpg')}});" class="item d-flex align-items-end">
              <div class="content">
                <h3 class="h5">Epidote & <br> Quartz</h3>
              </div>
            </div></div>
      </div>
    </div>
  </section>

  <!-- Divider Section-->
  <section style="background: url({{asset('images/crystal-1.jpg')}});" class="divider">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="h1 text-uppercase no-margin">Big Sales</h2>
        <p>At our outlet crystal</p><a href="{{url('shop')}}" class="btn btn-template wide shop-now">Shop Now<i class="icon-bag"></i></a>
        </div>
      </div>
    </div>
  </section>


  <!-- Women's Collection -->
  <section class="crystal-collection">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase"><small>Our Crystals</small>Check Our Crystals</h2>
      </header>
      <!-- Products Slider-->
      <div class="owl-carousel owl-theme products-slider">
          @foreach($products as $product)
        <!-- item-->
        <div class="item">
          <div class="product is-gray">
          <div class="image d-flex align-items-center justify-content-center"><img src="{{asset('images/' .$product['pimage'])}}" alt="product" class="img-fluid">
              <div class="hover-overlay d-flex align-items-center justify-content-center">
              <div class="CTA d-flex align-items-center justify-content-center">

                @foreach($categories as $category)
                @if($category['id'] == $product['categorie_id'])

                <a href="{{url('/shop' . '/' . $category['curl'] . '/' . $product['purl'])}}" class="visit-product active"><i class="icon-search"></i>View</a></div>

                @endif

                @endforeach

            </div>
            </div>
        <div class="title">
            <h3 class="h6 text-uppercase no-margin-bottom">{{$product['ptitle']}}</h3><span class="price text-muted">${{$product['pprice']}}</span></div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>
  <!-- Blog Section-->
  <section class="blog gray-bg">
    <div class="container">
      <header class="text-center">
        <h2 class="text-uppercase">Latest from the blog</h2>
      </header>
      <div class="row">
        <!-- post-->
        <div class="col-lg-6">
          <div class="post post-gray d-flex align-items-center flex-md-row flex-column">
          <div class="thumbnail d-flex-align-items-center justify-content-center"><img src="{{asset('images/blog-post.jpg')}}" alt="blog-image"></div>
            <div class="info">
              <h4 class="h5"> <a href="post.html">Polished Crystals </a></h4><span class="date"><i class="fa fa-clock-o"></i>May 10th 2020</span>
              <p>Must… continue… moving… in… ways… that… lead… to… dying… with… you. Awww, bitch! It's a dream, Morty! We're in your dog's dream. The night the dogs captured us, after you cried and crapped your pants.

            </p><a href="#" class="read-more">Read More<i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /end post-->
        <!-- post-->
        <div class="col-lg-6">
          <div class="post post-gray d-flex align-items-center flex-md-row flex-column">
            <div class="thumbnail d-flex-align-items-center justify-content-center"><img src="{{asset('images/blog-post1.jpg')}}" alt="..."></div>
            <div class="info">
              <h4 class="h5"> <a href="post.html">Crystals For Healing         </a></h4><span class="date"><i class="fa fa-clock-o"></i>June 14th 2020</span>
              <p>Rick, I don't like glowing rocks in the kitchen trash! We will return… possibly in different clothing. I'm a bit of a stickler Meeseeks, what about your short game? It's a device Morty.

            </p><a href="#" class="read-more">Read More<i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /end post-->
      </div>
    </div>
  </section>


@endsection
