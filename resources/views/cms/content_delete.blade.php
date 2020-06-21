@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Delete Content','icon' => 'fas fa-eraser'])
<div style="margin-top: 120px" class="row d-flex justify-content-center">
    <div class="col-md-8">
    <form action="{{url('cms/content/' . $content_id)}}" method="POST">
        @csrf
        {{method_field('DELETE')}}
            <div class="row">
                <div class="col">
                <h4 class="text-center">Are you sure you want to delete <b> {{$content_name->ctitle}}</b> content ?</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-6">
                    <div class="form-group text-center">
                        <a href="{{url('cms/content')}}" class="btn btn-secondary float-right w-50">Cancel</a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Delete" class="btn btn-danger float-left w-50"><i
                            class="icon-profile"></i>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>

@endsection
