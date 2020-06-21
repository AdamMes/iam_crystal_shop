@extends('cms.cms_master')

@section('cms_content')

  @include('utils/cms_header',['title' => 'Add New Menu Link','icon' => 'fas fa-plus-circle'])
  <div class="row d-flex justify-content-center">
     <div class="col-md-8">
     <form action="{{url('cms/menu')}}" method="POST" novalidate="novalidate" autocomplete="off" >
        @csrf
            <div class="form-group">
              <label for="link" class="form-label">*Link</label>
              <input value="{{old('link')}}"  id="link" name="link" type="text" class="origin-text  form-control @error('link') is-invalid @enderror">
              @error('link')
              <p class="alert alert-danger mt-1">{{ $message }}</p>
           @enderror
            </div>
            <div class="form-group">
              <label for="url" class="form-label">*Url</label>
              <input value="{{old('url')}}"  id="url" name="url" type="text" class="target-text form-control  @error('url') is-invalid @enderror">
              @error('url')
              <p class="alert alert-danger mt-1">{{ $message }}</p>
           @enderror
            </div>

            <div class="form-group">
              <label for="title" class="form-label">Title</label>
              <input value="{{old('title')}}"  id="title" name="title" type="text" class="form-control  @error('title') is-invalid @enderror">
              @error('title')
              <p class="alert alert-danger mt-1">{{ $message }}</p>
           @enderror
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group text-center">
                    <a href="{{url('cms/menu')}}" class="btn btn-secondary float-right w-50">Cancel</a>
                       </div>
                </div>
                <div class="col-6">
                     <div class="form-group text-center">
                    <input type="submit" name="submit" value="Save Menu" class="btn btn-primary float-left w-50"><i class="icon-profile"></i>
                  </div></div>
            </div>


          </form>
     </div>
  </div>

@endsection
