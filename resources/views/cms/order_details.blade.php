@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Order Details' ,'icon' => 'fas fa-info-circle'])
<div class="row d-flex justify-content-center">
<div class="col-xl-6">
    <div class="card shadow my-2">
        <div style="min-height: 400px" class="card-body">
            <div class="row">
                <div class="col-12">
                  <div class="d-flex justify-content-center mb-4">
                  <h1 class="h3 mb-0 text-gray-800 mt-1">Customer + Order Details</h1>
                    </div>
                </div>
            </div>
            <div class="row ml-2">
            <div class="col-md-4"><strong>Customer</strong> : {{$order[0]->name}}</div>
                <div class="col-md-4"><strong>Phone</strong> :  {{$order[0]->phone}}</div>
                <div class="col-md-4"><strong>Email</strong> :  {{$order[0]->email}}</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center mt-4">
                            <thead>
                                <tr>
                                    <th class="text-white">Crystal Name</th>
                                    <th class="text-white">Quantity</th>
                                    <th class="text-white">Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach(unserialize($order[0]->data) as $item)

                                <tr>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>${{$item['price']}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"><div class="h5 text-center mt-3"><strong>Total price:</strong> <span class="text-success">${{$order[0]->total}}</span></div> </div>
                <div class="col-lg-6"><div class="h5 text-center mt-3"><strong>Payment Method:</strong>
                @if($order[0]->paypal == 'on')
                  <span class="text-success">Paypal</span>
                @endif
                @if($order[0]->on_delivery == 'on')
                  <span class="text-success">On Delivery</span>
                @endif
                </div> </div>
            </div>
        </div>
    </div>
        </div>
        <div class="col-xl-6">
            <div class="card shadow my-2">
                <div style="min-height: 400px" class="card-body">
                    <div class="row">
                        <div class="col-12">
                          <div class="d-flex justify-content-center mb-4">
                          <h1 class="h3 mb-0 text-gray-800 mt-1">Shipping Details</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-2">
                    <div class="col-md-4"><strong>Country</strong> : {{$order[0]->country}}</div>
                        <div class="col-md-4"><strong>State</strong> :  {{$order[0]->state}}</div>
                        <div class="col-md-4"><strong>City</strong> :  {{$order[0]->city}}</div>
                    </div>
                    <div class="row ml-2 mt-3">
                    <div class="col-md-4"><strong>Street</strong> : {{$order[0]->street}}</div>
                        <div class="col-md-4"><strong>Zip</strong> :  {{$order[0]->zip}}</div>
                    </div>
                </div>
            </div>
                </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center mt-3">
            <a href="{{url('cms/orders')}}" class="btn btn-secondary float-right w-25">Cancel</a>
        </div>
    </div>


@endsection
