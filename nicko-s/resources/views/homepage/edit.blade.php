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
                            <h6 class="m-0 font-weight-bold text-primary">Edit Content 
                            <a href="{{url('admin/homepage')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/homepage/'.$data->id)}}">
                                @csrf
                                @method('put')
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <th>Featured Food Header<span class="text-danger">*</span></th>
                                        <td><textarea name="foodheader" class="form-control">{{$data->FeaturedFoodHeader}}</textarea></td>
                                    </tr>
                                    <tr>
                                    <th>Featured Food Sub Text<span class="text-danger">*</span></th>
                                        <td><textarea name="foodsubtext" class="form-control">{{$data->FeaturedFoodSubText}}</textarea></td>
                                    </tr>
                                    <tr>
                                    <th>Catering Header<span class="text-danger">*</span></th>
                                    <td><textarea name="cateringheader" class="form-control">{{$data->CateringTextHeader}}</textarea></td>
                                    </tr>
                                    <th>Catering Subt Text<span class="text-danger">*</span></th>
                                    <td><textarea name="cateringsubtext" class="form-control">{{$data->CateringSubText}}</textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input name="image" id="image" type="file"/>
                                        <img src="{{asset('public/img/'.$data->CateringImage)}}" width="100">
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number<span class="text-danger">*</span></th>
                                        <td><input value="{{$data->PhoneNumber}}" name="phone" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Location<span class="text-danger">*</span></th>
                                        <td><input value="{{$data->Location}}" name="location" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Email<span class="text-danger">*</span></th>
                                        <td><input value="{{$data->Email}}" name="email" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Publish Status</th>
                                        <td><input @if($data->publish_status=='on') checked @endif name="publish_status" type="checkbox"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                         <input type="submit" class="btn btn-primary" />
                                        </td>
                                    </tr>
                                </table>
                               </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection