@php

$menu = App\Menu::all()->toArray();

@endphp

@extends('master')

@section('main-content')

<div style="background-image: url({{asset('images/crystal-12.jpg')}});" class="coming-full-screen dark-overlay">
    <div class="container text-center text-white text-shadow overlay-content ">
        <section class="padding-small">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-10">
                  <h2 class="text-superbig">404</h2>
                  <p class="lead">We don't know what what happened but that <strong>page is not here</strong>.</p>
                <p class="lead">Please <a href="#" class="search text-bold">use search</a> or <a href="{{url('')}}" class="text-bold">go back to home page</a>.</p>
                </div>
              </div>
            </div>
          </section>

@endsection
