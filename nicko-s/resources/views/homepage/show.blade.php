@extends('adminlayout')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Home Page Content
                            <a href="{{url('admin/homepage')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Food Feature Header</th>
                                        <td>{{$data->FeaturedFoodHeader}}</td>
                                    </tr>
                                    <tr>
                                        <th>Food Feature Sub Text</th>
                                        <td>{{$data->FeaturedFoodSubText}}</td>
                                    </tr>
                                    <tr>
                                        <th>Catering Header</th>
                                        <td>{{$data->CateringTextHeader}}</td>
                                    </tr>
                                    <tr>
                                        <th>Catering Sub Text</th>
                                        <td>{{$data->CateringSubText}}</td>
                                    </tr>
                                    <th>Catering Image</th>
                                    <td><img src="{{asset('public/img/'.$data->CateringImage)}}" width="100"></td>
                                    <!-- <tr>
                                        <td colspan="2">
                                         <input type="submit" class="btn btn-primary" />
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$data->Phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Location</th>
                                        <td>{{$data->Location}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$data->Email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Publish Status</th>
                                        <td>{{$data->publish_status}}</td>
                                    </tr>
                                </table>
                               
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection