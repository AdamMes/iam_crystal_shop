@extends('master')

@section('main-content')

    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
          <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
              <h1>Signin</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
              <ul class="breadcrumb justify-content-lg-end">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active">Signin</li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- signin-->
      <section class="padding-small">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
              <div class="block">
                <div class="block-header">
                  <h5>Signin to your user accout</h5>
                </div>
                <div class="block-body">
                  <p class="lead">Already our customer?</p>
                  <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                  <hr>
                  <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                      @csrf()
@if(!empty($sign_error))
                  <p class="alert alert-danger">{{$sign_error}}</p>
@endif
                    <div class="form-group">
                      <label for="email" class="form-label">Email</label>
                    <input value="{{old('email')}}" id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
    <p class="alert alert-danger mt-1">{{ $message }}</p>
@enderror
                    </div>
                    <div class="form-group">
                      <label for="password" class="form-label">Password</label>
                      <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                      @error('password')
                      <p class="alert alert-danger mt-1">{{ $message }}</p>
                  @enderror
                    </div>
                    <div class="form-group text-center">
                      <button type="submit" name="submit" class="btn btn-primary w-50"><i class="fa fa-sign-in"></i> Log in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



@endsection
