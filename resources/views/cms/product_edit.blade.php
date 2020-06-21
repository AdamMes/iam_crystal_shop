@extends('cms.cms_master')

@section('cms_content')

  @include('utils/cms_header',['title' => 'Add New Product','icon' => 'fas fa-plus-circle'])
  <div class="row d-flex justify-content-center">
     <div class="col-md-8">
             <form action="{{url('cms/products/' . $item['id'])}}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data" >
        @csrf
        {{method_field('PUT')}}
          <input type="hidden" name="item_id" value="{{$item['id']}}">
        <div class="form-group">
            <label for="category-id" class="form-label">*Category</label>
            <select name="category_id" id="category-id" class="form-control @error('category_id') is-invalid @enderror">

            @foreach($categories as $category)

            <option @if($item['categorie_id'] == $category['id']) selected="selected" @endif  value="{{$category['id']}}">{{$category['ctitle']}}</option>

            @endforeach
        </select>
            @error('category_id')
            <p class="alert alert-danger mt-1">{{ $message }}</p>
            @enderror

        </div>
            <div class="form-group">
              <label for="title" class="form-label">*Title</label>
              @php $title_value = !empty(old('title')) ? old('title') : $item['ptitle']; @endphp

              <input value="{{$title_value}}"  id="title" name="title" type="text" class="origin-text  form-control @error('title') is-invalid @enderror">
              @error('title')
              <p class="alert alert-danger mt-1">{{ $message }}</p>
           @enderror
            </div>
            <div class="form-group">
              <label for="url" class="form-label">*Url</label>
              @php $url_value = !empty(old('url')) ? old('url') : $item['purl']; @endphp

              <input value="{{$url_value}}"  id="url" name="url" type="text" class="target-text form-control  @error('url') is-invalid @enderror">
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

<div class="row">
    <div class="col d-flex justify-content-center">
        <img width="300px" class="img-thumbnail " src="{{asset('images/' . $item['pimage'])}}" alt="product image">
    </div>
</div>
            <div class="form-group">
                <label for="article" class="form-label">*Article <small class="text-danger">(image max size : 4MB)</small></label>
                @php $article_value = !empty(old('article')) ? old('article') : $item['particle']; @endphp

            <textarea id="article" class="form-control @error('article') is-invalid @enderror" name="article"  cols="30" rows="10">{{$article_value}}</textarea>
             @error('article')
             <p class="alert alert-danger mt-1">{{ $message }}</p>
             @enderror
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="color" class="form-label">*Color</label>
                        @php $color_value = !empty(old('color')) ? old('color') : $item['pcolor']; @endphp

                        <input value="{{$color_value}}"  id="color" name="color" type="text" class="form-control  @error('color') is-invalid @enderror">
                        @error('color')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="weight" class="form-label">*Weight</label>
                        @php $weight_value = !empty(old('weight')) ? old('weight') : $item['pweight']; @endphp
                        <input value="{{$weight_value}}"  id="weight" name="weight" type="text" class="form-control  @error('weight') is-invalid @enderror">
                        @error('weight')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="size" class="form-label">*Size</label>
                        @php $size_value = !empty(old('size')) ? old('size') : $item['psize']; @endphp
                        <input value="{{$size_value}}"  id="size" name="size" type="text" class="form-control  @error('size') is-invalid @enderror">
                        @error('size')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="location" class="form-label">*Location</label>
                        @php $location_value = !empty(old('location')) ? old('location') : $item['plocation']; @endphp
                        <input value="{{$location_value}}"  id="location" name="location" type="text" class="form-control  @error('location') is-invalid @enderror">
                        @error('location')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="price" class="form-label">*Price</label>
                        @php $price_value = !empty(old('price')) ? old('price') : $item['pprice']; @endphp
                        <input value="{{$price_value}}"  id="price" name="price" type="text" class="form-control  @error('price') is-invalid @enderror">
                        @error('price')
                        <p class="alert alert-danger mt-1">{{ $message }}</p>
                     @enderror
                      </div>
                </div>

            </div>


            <div class="row mb-5">
                <div class="col-6">
                    <div class="form-group text-center">
                    <a href="{{url('cms/products')}}" class="btn btn-secondary float-right w-50">Cancel</a>
                       </div>
                </div>
                <div class="col-6">
                     <div class="form-group text-center">
                    <input type="submit" name="submit" value="Update Product" class="btn btn-primary float-left w-50"><i class="icon-profile"></i>
                  </div></div>
            </div>


          </form>
     </div>
  </div>

@endsection
