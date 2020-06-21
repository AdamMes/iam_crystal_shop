@php

$menu = App\Menu::all()->toArray();

@endphp

@extends('master')

@section('main-content')

<div style="background-image: url({{asset('images/crystal-11.jpg')}});" class="coming-full-screen dark-overlay">
    <div class="container text-center text-white text-shadow overlay-content">
        <section class="padding-small">
            <div class="container">
              <div class="row d-flex justify-content-center">
                <div class="col-xl-8 col-lg-10">
                  <h2 class="text-superbig">500</h2>
                  <p class="lead">Oops, something just went wrong. <strong>Don't worry though</strong>.</p>
                <p class="lead">Please, <a href="{{url('')}}" class="text-bold">start from the homepage</a> or <a href="{{url('contant-us')}}" class="text-bold">contact our support</a>.</p>
                </div>
              </div>
            </div>
          </section>

@endsection
