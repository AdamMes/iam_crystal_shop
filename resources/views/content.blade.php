@extends('master')

@section('main-content')

 @if($contents)

 <!-- Hero Section-->
@foreach($contents as $content)

 <!-- Hero Section-->
 <section class="hero hero-page gray-bg padding-small">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-9 order-2 order-lg-1">
        <h1>{{$content->ctitle}}</h1>
        </div>
        <div class="col-lg-3 text-right order-1 order-lg-2">
          <ul class="breadcrumb justify-content-lg-end">
            <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
            <li class="breadcrumb-item active">{{$content->ctitle}}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <?= $content->article ?>


@endforeach

@else


<div style="background-image: url({{asset('images/crystal-13.jpg')}});" class="coming-full-screen dark-overlay">
      <div class="container text-center text-white text-shadow overlay-content py-5">

        <h2 class="h1 mb-5">No Content Available</h2>
        <p class="h3">Please <a href="#" class="search text-bold text-success">use search</a> or <a href="{{url('')}}" class="text-bold text-success">go back to home page</a>.</p>
        <!-- countdown-->

      </div>
    </div>


 @endif



@endsection
