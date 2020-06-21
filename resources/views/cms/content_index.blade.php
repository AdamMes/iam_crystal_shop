@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Content','icon' => 'fas fa-layer-group'])
<div class="row">
    <div class="col-12">
        <div class="card shadow my-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center"> <h6 class="font-weight-bold text-dark text-center">Here you can see all the contents on the site (exsept store) and you can <strong>Add/Edit/Delete</strong> as you wish</h6></div>
                    <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                        <a style="background-color: #C193D5" href="{{url('cms/content/create')}}" class="btn d-flex align-items-center text-white">
                        <i class="fas fa-plus-circle"></i>
                        &nbsp;
                         Add Content Link
                    </a></div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center h5 text-white">Content Title</th>
                      <th class="text-center h5 text-white">For Menu</th>
                      <th class="text-center h5 text-white">Last Update</th>
                      <th class="text-center h5 text-white">Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contents as $content)


                    <tr class="text-center">
                    <td class="h6"><strong>{{$content['ctitle']}}</strong></td>
                    <td class="h6">
@foreach($menu as $menu_item)

@if($menu_item['id'] == $content['menu_id'])

{{$menu_item['link']}}

@endif

@endforeach
                    </td>
                    <td class="h6">{{date('d/m/Y',strtotime($content['updated_at']))}}</td>

                    <td><a href="{{url('cms/content/' . $content['id'] . '/edit')}}" class="text-success">
                        <i class="far fa-edit "></i>
                        Edit
                     </a> |
                    <a href="{{url('cms/content/' . $content['id'])}}" class="text-danger">
                        <i class="fas fa-eraser"></i>
                            Delete
                     </a>
                    </td>
                    </tr>


                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection
