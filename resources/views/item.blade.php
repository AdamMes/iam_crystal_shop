@extends('master')

@section('main-content')


<section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
        <h1>{{$item->ptitle}}</h1>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href={{url('')}}>Home</a></li>
            <li class="breadcrumb-item"><a href={{url('shop')}}>Shop</a></li>
          <li class="breadcrumb-item"><a href={{url('shop',$item->curl)}}>{{$item->ctitle}}</a></li>
            <li class="breadcrumb-item active">{{$item->ptitle}}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="product-details">
    <div class="container">
      <div class="row">
        <div class="product-images col-lg-6">

          <div data-slider-id="1" class="owl-carousel items-slider owl-drag">
            <div class="item"><img src="{{asset('images/' . $item->pimage)}}" alt="crystal-image"></div>
            <div class="item"><img class="w-150" src="{{asset('images/' . $item->pimage)}}" alt="crystal-image"></div>
            <div class="item"><img src="{{asset('images/' . $item->pimage)}}" alt="crystal-image"></div>

          </div>
          <div data-slider-id="1" class="owl-thumbs d-flex justify-content-center">
            <button class="owl-thumb-item"><img src="{{asset('images/' . $item->pimage)}}" alt="crystal-image"></button>
            <button class="owl-thumb-item active"><img src="{{asset('images/' . $item->pimage)}}" alt="crystal-image"></button>
            <button class="owl-thumb-item"><img src="{{asset('images/' . $item->pimage)}}" alt="crystal-image"></button>

          </div>
        </div>
        <div class="details col-lg-6">
          <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row">
            <ul class="price list-inline no-margin">
            <li class="list-inline-item current">${{$item->pprice}}</li>
            </ul>
            <div class="review d-flex align-items-center">
              <ul class="rate list-inline">
                <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
              </ul><span class="text-muted">5 reviews</span>
            </div>
          </div>
        <p>{{strip_tags($item->particle)}}</p>

          <ul class="CTAs list-inline d-flex justify-content-center">
            <li class="list-inline-item">
                @if(! Cart::get($item->id))

                <button data-pid={{$item->id}} type="button" href="#" class="btn btn-template wide add-to-cart"> <i class="icon-cart"></i>Add to Cart</button>
                @else
                <button disabled="disabled" type="button" href="#" class="btn btn-template wide add-to-cart">In Cart</button>
                @endif
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="product-description no-padding">
    <div class="container">
      <ul role="tablist" class="nav nav-tabs flex-column flex-sm-row">

        <li class="nav-item"><a data-toggle="tab" href="#additional-information" role="tab" class="nav-link">Another Information</a></li>
        <li class="nav-item"><a data-toggle="tab" href="#reviews" role="tab" class="nav-link">Reviews</a></li>
      </ul>
      <div class="tab-content">

        <div id="additional-information" role="tabpanel" class="tab-pane active">
          <table class="table">
            <tbody>
              <tr>
                <th class="border-0">Size:</th>
                <td class="border-0">{{$item->psize}}</td>
              </tr>
              <tr>
                <th>Weight:</th>
                <td>{{$item->pweight}}</td>
              </tr>
              <tr>
                <th>Location (from):</th>
                <td>{{$item->plocation}}</td>
              </tr>
              <tr>
                <th>Color:</th>
              <td>{{$item->pcolor}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="reviews" role="tabpanel" class="tab-pane">
          <div class="row">
            <div class="col-xl-9">
              <div class="row review">
              <div class="col-3 text-center"><img src="{{asset('lib/hub/img/person-1.jpg')}}" alt="Han Solo" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                <div class="col-9 review-text">
                  <h6>Han Solo</h6>
                  <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i>
                  </div>
                  <p class="text-muted text-small">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections</p>
                </div>
              </div>
              <div class="row review">
                <div class="col-3 text-center"><img src="{{asset('lib/hub/img/person-2.jpg')}}" alt="Luke Skywalker" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                <div class="col-9 review-text">
                  <h6>Luke Skywalker</h6>
                  <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star-o text-primary"></i>
                  </div>
                  <p class="text-muted text-small">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. &quot;What's happened to me?&quot; he thought. It wasn't a dream.</p>
                </div>
              </div>
              <div class="row review">
                <div class="col-3 text-center"><img src="{{asset('lib/hub/img/person-3.jpg')}}" alt="Princess Leia" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                <div class="col-9 review-text">
                  <h6>Princess Leia</h6>
                  <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star-o text-primary"></i><i class="fa fa-star-o text-primary"></i>
                  </div>
                  <p class="text-muted text-small">His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table.</p>
                </div>
              </div>
              <div class="row review">
                <div class="col-3 text-center"><img src="{{asset('lib/hub/img/person-4.jpg')}}" alt="Jabba Hut" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                <div class="col-9 review-text">
                  <h6>Jabba Hut</h6>
                  <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i>
                  </div>
                  <p class="text-muted text-small">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="share-product gray-bg d-flex align-items-center justify-content-center flex-column flex-md-row"><strong class="text-uppercase">Share this on</strong>
        <ul class="list-inline text-center">
          <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
          <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
          <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
          <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
        </ul>
      </div>
    </div>
  </section>


@endsection
