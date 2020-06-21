@extends('cms.cms_master')

@section('cms_content')

@include('utils/cms_header',['title' => 'Users','icon' => 'fas fa-users'])
<div class="row">
    <div class="col-12">
        <div class="card shadow my-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <h6 class="font-weight-bold text-dark text-center">Here you can see all the Users on the
                            site and you can <strong>Add/Edit/Delete</strong> as you wish</h6>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                        <a style="background-color: #C193D5" href="{{url('cms/users/create')}}"
                            class="btn d-flex align-items-center text-white">
                            <i class="fas fa-plus-circle"></i>
                            &nbsp;
                            Add User
                        </a></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center h5 text-white">#ID</th>
                                <th class="text-center h5 text-white">Name</th>
                                <th class="text-center h5 text-white">Email</th>
                                <th class="text-center h5 text-white">Country</th>
                                <th class="text-center h5 text-white">Created At</th>
                                <th class="text-center h5 text-white">Permission</th>
                                <th class="text-center h5 text-white">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)

                            <tr class="text-center">
                                <td class="h6"><strong>{{$user['id']}}</strong></td>
                                <td class="h6">{{$user['name']}}</td>
                                <td class="h6">{{$user['email']}}</td>
                                <td class="h6">{{$user['country']}}</td>
                                <td class="h6">{{date('d/m/Y',strtotime($user['created_at']))}}</td>
                                <td>

                                    @foreach($permissions as $permission)

                                    @if($permission->uid == $user['id'])

                                  {{$permission->pname}}


                                    @endif

                                    @endforeach

                                </td>
                                <td><a href="{{url('cms/users/' . $user['id'] . '/edit')}}" class="text-success">
                                        <i class="far fa-edit "></i>
                                        Edit
                                    </a> |
                                    <a href="{{url('cms/users/' . $user['id'])}}" class="text-danger">
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
