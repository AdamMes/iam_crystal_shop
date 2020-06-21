<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$page_title ?? ''}}</title>
    <link rel="icon" href="{{ asset('images/icon-for-browser.png') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="{{asset('lib/hub/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="{{asset('lib/hub/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Bootstrap Select-->
  <link rel="stylesheet" href="{{asset('lib/hub/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- Price Slider Stylesheets -->
  <link rel="stylesheet" href="{{asset('lib/hub/vendor/nouislider/nouislider.css')}}">
    <!-- Custom font icons-->
  <link rel="stylesheet" href="{{asset('lib/hub/css/custom-fonticons.css')}}">
    <!-- Google fonts - Poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700">
    <!-- owl carousel-->
  <link rel="stylesheet" href="{{asset('lib/hub/vendor/owl.carousel/assets/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('lib/hub/vendor/owl.carousel/assets/owl.theme.default.css')}}">
      <!-- Leaflet Maps-->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="">
    <!-- Toastr-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- theme stylesheet-->
  <link rel="stylesheet" href="{{asset('lib/hub/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="{{asset('lib/hub/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Modernizr-->
  <script src="{{asset('lib/hub/js/modernizr.custom.79639.js')}}">
</script>
<script> var BASE_URL = "{{url('')}}/";</script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>

    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <form action="#">
              <div class="form-group">
                <input type="search" name="search" id="search" placeholder="Search ...">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid">
        <!-- Navbar Header  --><a href="{{url('')}}" class="navbar-brand"><img class="w-50" src="{{asset('images/main-icon.png')}}" alt="site logo"></a>



 <!-- Cart Dropdown-->
 <div class="cart dropdown show cart-icon-style">
     <a id="cartdetails" href="https://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
        <i class="icon-cart fa-2x "></i>
        @if(!Cart::isEmpty())
        <div class="cart-no">{{Cart::getTotalQuantity()}}</div>
        @endif
</a>

<a href="{{url('shop/cart')}}" class="text-primary view-cart">View Cart</a>

    <?php
    $items = Cart::getContent()->toArray();
    ?>

<div aria-labelledby="cartdetails" class="dropdown-menu">
  <!-- cart item-->
  <div>



    @if($items != null)
    @foreach($items as $item )

    <div class="dropdown-item cart-product">
        <div class="d-flex align-items-center">
        <div class="img"><img width="150%" src="{{url('')}}/images/{{$item['attributes']['image']}}" alt="item in cart" class=""></div>
          <div class="details d-flex justify-content-between">
          <div class="text">
              <strong>{{$item['name']}}</strong><span class="price">$ {{$item['price']}}</span></div>
          </div>
        </div>
      </div>
      <!-- total price-->

      @endforeach
      @endif
      <div class="dropdown-item total-price d-flex justify-content-between"><span>Total</span><strong class="text-primary"></strong>
      ${{Cart::getTotal()}}
    </div>
  </div>

  <!-- call to actions-->
<div class="dropdown-item CTA d-flex  mt-2"><a href="{{url('shop/cart')}}" class="btn btn-template wide">View Cart</a>
    <a href="{{url('shop/checkout')}}" class="btn btn-template wide">Checkout</a></div>
</div>
</div>




          <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">

              <li class="nav-item"><a href="{{url('')}}" class="nav-link text-center">Home</a></li>
              <li class="nav-item"><a href="{{url('shop')}}" class="nav-link text-center">Shop</a></li>
              @if(!empty($menu))

              @foreach($menu as $menu_item)
                          <li class="nav-item"><a href="{{url($menu_item['url'])}}" class="nav-link text-center">{{$menu_item['link']}}</a></li>
              @endforeach

              @endif

              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(!Session::has('user_id'))

              <li class="nav-item"><a href="{{url('user/signin')}}" class="nav-link text-center">Signin</a></li>

              <li class="nav-item"><a href="{{url('user/signup')}}" class="nav-link text-center">Signup</a>
              </li>
@else

@if(Session::has('is_admin'))
<li class="nav-item"><a href="{{url('cms/dashboard')}}" class="nav-link text-center">Admin Panel</a>
</li>
@endif

<li class="nav-item"><a href="{{url('user/logout')}}" class="nav-link text-center">Logout</a>
</li>

              @endif
            </ul>
            <div class="right-col d-flex align-items-lg-center flex-column flex-lg-row">
                   <!-- User Not Logged - link to login page-->
                   @if(Session::has('user_id'))

              <div class="user"> <a id="userdetails" href="customer-login.html" class="user-link"><i class="icon-profile"></i></a></div>

              @endif

              <!-- Search Button-->
              <div class="search"><i class="icon-search"></i></div>

            </div>
          </div>
        </div>
      </nav>
    </header>
<main style="min-height: 800px">



@yield('main-content')

</main>


    <div id="scrollTop"><i class="fa fa-long-arrow-up"></i></div>
    <!-- Footer-->
    <footer class="main-footer">
      <!-- Service Block-->
      <div class="services-block">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 d-flex justify-content-center justify-content-lg-start">
              <div class="item d-flex align-items-center">
                <div class="icon"><i class="icon-truck"></i></div>
                <div class="text">
                  <h6 class="no-margin text-uppercase">Free shipping &amp; return</h6><span>Free Shipping over $300</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
              <div class="item d-flex align-items-center">
                <div class="icon"><i class="icon-coin"></i></div>
                <div class="text">
                  <h6 class="no-margin text-uppercase">Money back guarantee</h6><span>14 Days Money Back Guarantee</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
              <div class="item d-flex align-items-center">
                <div class="icon"><i class="icon-headphones"></i></div>
                <div class="text">
                  <h6 class="no-margin text-uppercase">050-50505050</h6><span>24/7 Available Support</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main Block -->

      <div class="copyrights">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="text col-md-4">
              <p><b>I AM &copy; {{date('M Y')}}</b></p>
            </div>
            <div class="text col-md-4 mt-1">
                <ul class="social-menu list-inline d-flex justify-content-center">
                    <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook fa-2x"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram fa-2x"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest fa-2x"></i></a></li>
                    <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo fa-2x"></i></a></li>
                  </ul>
            </div>
            <div class="payment col-md-4 clearfix ">
              <ul class="payment-list list-inline-item pull-right ">
              <li class="list-inline-item"><img src="{{asset('lib/hub/img/visa.svg')}}" alt="visa-logo"></li>
              <li class="list-inline-item"><img src="{{asset('lib/hub/img/mastercard.svg')}}" alt="mastercard-logo"></li>
              <li class="list-inline-item"><img src="{{asset('lib/hub/img/paypal.svg')}}" alt="paypal-logo"></li>
              <li class="list-inline-item"><img src="{{asset('lib/hub/img/western-union.svg')}}" alt="westernunion-logo"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{asset('lib/hub/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('lib/hub/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/jquery-countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/masonry-layout/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('lib/hub/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>

    <!-- masonry -->
    <script>
        $(function(){
            var $grid = $('.masonry-wrapper').masonry({
                itemSelector: '.item',
              columnWidth: '.item',
              percentPosition: true,
              transitionDuration: 0,
            });

            $grid.imagesLoaded().progress( function() {
                $grid.masonry();
            });
        })


        </script>
        <!-- LeafletJS CDN-->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

        <!-- Main Template File-->
        <script src="{{asset('lib/hub/js/front.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('js/app.js')}}"></script>
       @if(Session::has('sm'))
       <script>
        toastr.options.positionClass = 'toast-bottom-full-width';
        toastr.success('',"{{Session::get('sm')}}")
        </script>
       @endif

    </body>
    </html>
