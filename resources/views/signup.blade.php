@extends('master')

@section('main-content')

    <!-- Hero Section-->
    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
          <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
              <h1>Signup</h1>
            </div>
            <div class="col-lg-3 text-right order-1 order-lg-2">
              <ul class="breadcrumb justify-content-lg-end">
                <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                <li class="breadcrumb-item active">Signup</li>
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
                  <h5>Create New Account</h5>
                </div>
                <div class="block-body">
                    <div class="row" >
                        <div class="col-6 text-center">
                           <p class="lead">Already our customer?</p>
                        </div>
                        <div class="col-6 text-center">
                        <a class="btn btn-primary w-50" href="{{url('user/signin' . $rn)}}"><i class="fa fa-sign-in"></i> Log in</a>
                        </div>
                    </div>

                    <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                  <hr>
                  <form action="" method="POST" autocomplete="off" novalidate="novalidate">
                      @csrf()

                    <div class="form-group">
                    <label for="name" class="form-label">* Name</label>
                    <input value="{{old('name')}}" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <p class="alert alert-danger mt-1">{{ $message }}</p>
                 @enderror
                    </div>
                    <div class="form-group">
                      <label for="email" class="form-label">* Email</label>
                    <input value="{{old('email')}}" id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                     @error('email')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                    </div>
                    <div class="form-group">
                      <label for="password" class="form-label">* Password</label>
                      <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                      @error('password')
                      <p class="alert alert-danger mt-1">{{ $message }}</p>
                  @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation" class="form-label">* Confirm Password</label>
                        <input id="password-confirmation" type="password" name="password_confirmation" class="form-control">
                      </div>
                    <div class="form-group">
                        <label for="country" class="form-label">* Country</label>
                        <select id="country" name="country" class="bs-select w-100 @error('county') is-invalid @enderror">
                            <option value="{{old('country') ?? ''}}">{{old('country') ?? 'Choose Your Country'}}</option>
                          @foreach ($countries as $country)
                        <option value="{{$country->name}}">{{$country->name}}</option>
                          @endforeach
                          </select>
                          @error('country')
                          <p class="alert alert-danger mt-1">{{ $message }}</p>
                      @enderror
                      </div>


                    <div class="form-group text-center">
                      <button type="submit" name="submit" class="btn btn-primary w-50"><i class="icon-profile"></i> Register</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



@endsection




