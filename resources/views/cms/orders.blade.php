@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Customers Orders','icon' => 'fas fa-shipping-fast'])
<div class="row">
    <div class="col-12">
        <div class="card shadow my-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center h5 text-white">#ID</th>
                        <th class="text-center h5 text-white">User Name</th>

                        <th class="text-center h5 text-white">Total</th>
                        <th class="text-center h5 text-white">Date</th>
                        <th class="text-center h5 text-white">Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)

                      <tr class="text-center">
                      <td class="h6">{{$order->id}}</td>
                      <td class="h6">{{$order->name}}</td>
                      <td class="h6">$ {{$order->total}}</td>
                      <td class="h6">{{date('d/m/Y H:i:s',strtotime($order->created_at))}}</td>
                      <td> <a style="background-color: #C193D5"  href="{{url('cms/orders/' . $order->id)}}" class="btn text-white">
                        <i class="fas fa-info-circle"></i>
                           All Details
                     </a></td>

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
