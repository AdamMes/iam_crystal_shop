@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Add New Content','icon' => 'fas fa-plus-circle'])
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <form action="{{url('cms/content')}}" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="menu_id" class="form-label">*Menu Link</label>
                <select name="menu_id" id="menu_id" class="form-control @error('menu_id') is-invalid @enderror">
                    <option value="">Choose Menu Link ...</option>

                @foreach($menu as $menu_item)

                <option @if(old('menu_id') == $menu_item['id']) selected="selected" @endif  value="{{$menu_item['id']}}">{{$menu_item['link']}}</option>

                @endforeach
            </select>
                @error('menu_id')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group">
                <label for="title" class="form-label">*Title</label>
                <input value="{{old('title')}}" id="title" name="title" type="text"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
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


            <div class="row">
                <div class="col-6">
                    <div class="form-group text-center">
                        <a href="{{url('cms/content')}}" class="btn btn-secondary float-right w-50">Cancel</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Save Content" class="btn btn-primary float-left w-50"><i
                            class="icon-profile"></i>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection
