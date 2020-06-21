@extends('cms.cms_master')

@section('cms_content')

  @include('utils/cms_header',['title' => 'Edit Menu Link','icon' => 'far fa-edit'])
  <div class="row d-flex justify-content-center">
     <div class="col-md-8">
     <form action="{{url('cms/menu/' . $item['id'])}}" method="POST" novalidate="novalidate" autocomplete="off" >
        @csrf
        {{method_field('PUT')}}
     <input type="hidden" name="item_id" value="{{$item['id']}}">
            <div class="form-group">
              <label for="link" class="form-label">*Link</label>
              @php $link_value = !empty(old('link')) ? old('link') : $item['link']; @endphp
            <input value="{{$link_value}}"  id="link" name="link" type="text" class="form-control origin-text @error('link') is-invalid @enderror">
              @error('link')
              <p class="alert alert-danger mt-1">{{ $message }}</p>
           @enderror
            </div>
            <div class="form-group">
              <label for="url" class="form-label">*Url</label>
              @php $url_value = !empty(old('url')) ? old('url') : $item['url']; @endphp
              <input value="{{$url_value}}"  id="url" name="url" type="text" class="form-control target-text  @error('url') is-invalid @enderror">
              @error('url')
              <p class="alert alert-danger mt-1">{{ $message }}</p>
           @enderror
            </div>

            <div class="form-group">
              <label for="title" class="form-label">Title</label>
              @php $title_value = !empty(old('title')) ? old('title') : $item['title']; @endphp
              <input value="{{$title_value}}"  id="title" name="title" type="text" class="form-control  @error('title') is-invalid @enderror">
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
                    <input type="submit" name="submit" value="Update Menu" class="btn btn-primary float-left w-50"><i class="icon-profile"></i>
                  </div></div>
            </div>


          </form>
     </div>
  </div>

@endsection
