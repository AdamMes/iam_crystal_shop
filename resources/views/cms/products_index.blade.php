@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Products','icon' => 'fas fa-cubes'])
<div class="row">
    <div class="col-12">
        <div class="card shadow my-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center"> <h6 class="font-weight-bold text-dark text-center">Here you can see all the pruducts and you can <strong>Add/Edit/Delete</strong> as you wish</h6></div>
                    <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                        <a style="background-color: #C193D5" href="{{url('cms/products/create')}}" class="btn d-flex align-items-center text-white">
                        <i class="fas fa-plus-circle"></i>
                        &nbsp;
                        Add Product
                    </a></div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center h5 text-white">Product Title</th>
                      <th class="text-center h5 text-white">Category</th>
                      <th class="text-center h5 text-white">Product Image</th>
                      <th class="text-center h5 text-white">Last Update</th>
                      <th class="text-center h5 text-white">Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)

                    <tr class="text-center">
                    <td class="h6"><strong>{{$product['ptitle']}}</strong></td>
                    <td class="h6">
                        @foreach($categories as $category)

@if($product['categorie_id'] == $category['id'])

{{$category['ctitle']}}

@endif
                        @endforeach
                    </td>
                    <td class="h6"><img width="110" class="img-fluid" src="{{asset('images/' . $product['pimage'])}}" alt="product image"></td>
                    <td class="h6">{{date('d/m/Y',strtotime($product['updated_at']))}}</td>

                    <td><a href="{{url('cms/products/' . $product['id'] . '/edit')}}" class="text-success">
                        <i class="far fa-edit "></i>
                        Edit
                     </a> |
                    <a href="{{url('cms/products/' . $product['id'])}}" class="text-danger">
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
