@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Add New User','icon' => 'fas fa-plus-circle'])
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <form action="{{url('cms/users')}}" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="permission_id" class="form-label">*User Permission</label>
                <select name="permission_id" id="permission_id" class="form-control @error('permission_id') is-invalid @enderror">
                    <option value="">Choose Permission ...</option>

                @foreach($permissions as $permission)

                <option @if(old('permission_id') == $permission['id']) selected="selected" @endif  value="{{$permission['id']}}">{{$permission['pname']}}</option>

                @endforeach
            </select>
                @error('permission_id')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group">
                <label for="name" class="form-label">*Name</label>
                <input value="{{old('name')}}" id="name" name="name" type="text"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-label">*Email</label>
                <input value="{{old('email')}}" id="email" name="email" type="email"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="country" class="form-label">*Country</label>
                <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                    <option value="">Choose Country ...</option>
                @foreach($countries as $country)

                <option @if(old('country') == $country->name) selected="selected" @endif  value="{{$country->name}}">{{$country->name}}</option>

                @endforeach
            </select>
                @error('country')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="form-group">
                <label for="password" class="form-label">*Password</label>
                <input value="" id="password" name="password" type="password"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="row">
                <div class="col-6">
                    <div class="form-group text-center">
                        <a href="{{url('cms/users')}}" class="btn btn-secondary float-right w-50">Cancel</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Save User" class="btn btn-primary float-left w-50"><i
                            class="icon-profile"></i>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection
