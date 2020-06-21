@extends('cms.cms_master')

@section('cms_content')

  @include('utils/cms_header',['title' => 'Add New Category','icon' => 'fas fa-plus-circle'])
  <div class="row d-flex justify-content-center">
     <div class="col-md-8">
     <form action="{{url('cms/categories')}}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
              <label for="title" class="form-label">*Title</label>
              <input value="{{old('title')}}"  id="title" name="title" type="text" class="origin-text  form-control @error('title') is-invalid @enderror">
              @error('title')
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
                <label for="image">Category Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose Image File</label>
                    </div>
                </div>
                @error('image')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
             @enderror
            </div>

            <div class="form-group">
                <label for="article" class="form-label">*Article <small class="text-danger">(image max size : 4MB)</small></label>
            <textarea id="article" class="form-control @error('article') is-invalid @enderror" name="article"  cols="30" rows="10">{{old('article')}}</textarea>
             @error('article')
             <p class="alert alert-danger mt-1">{{ $message }}</p>
             @enderror
            </div>


            <div class="row mb-5">
                <div class="col-6">
                    <div class="form-group text-center">
                    <a href="{{url('cms/categories')}}" class="btn btn-secondary float-right w-50">Cancel</a>
                       </div>
                </div>
                <div class="col-6">
                     <div class="form-group text-center">
                    <input type="submit" name="submit" value="Save Category" class="btn btn-primary float-left w-50"><i class="icon-profile"></i>
                  </div></div>
            </div>


          </form>
     </div>
  </div>

@endsection
