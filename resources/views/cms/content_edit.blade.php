@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Edit Content','icon' => 'far fa-edit'])
<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <form action="{{url('cms/content/'  . $item['id'])}}" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="menu_id" class="form-label">*Menu Link</label>

                <select name="menu_id" id="menu_id" class="form-control @error('menu_id') is-invalid @enderror">

                @foreach($menu as $menu_item)

                <option @if($item['menu_id'] == $menu_item['id']) selected="selected" @endif  value="{{$menu_item['id']}}">{{$menu_item['link']}}</option>

                @endforeach
            </select>
                @error('menu_id')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="form-group">
                <label for="title" class="form-label">*Title</label>
                @php $title_value = !empty(old('title')) ? old('title') : $item['ctitle']; @endphp
                <input value="{{$title_value}}" id="title" name="title" type="text"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <p class="alert alert-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="article" class="form-label">*Article <small class="text-danger">(image max size : 4MB)</small></label>
                @php $article_value = !empty(old('article')) ? old('article') : $item['article']; @endphp
            <textarea id="article" class="form-control @error('article') is-invalid @enderror" name="article"  cols="30" rows="10">{{$article_value}}</textarea>
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
                        <input type="submit" name="submit" value="Update Content" class="btn btn-primary float-left w-50"><i
                            class="icon-profile"></i>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection
