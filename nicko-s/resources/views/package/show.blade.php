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
                            <h6 class="m-0 font-weight-bold text-primary">Catering Package
                            <a href="{{url('admin/package')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Package Name</th>
                                        <td>{{$data->PackageName}}</td>
                                    </tr>
                                    <tr>
                                        <th>Lechon Qty</th>
                                        <td>{{$data->LechonQty}}</td>
                                    </tr>
                                    <tr>
                                        <th>Foods Included</th>
                                        <td>{{$data->Foods}}</td>
                                    </tr>
                                    <tr>
                                        <th>Desserts</th>
                                        <td>{{$data->Desserts}}</td>
                                    </tr>
                                    <tr>
                                        <th>Beverages</th>
                                        <td>{{$data->Beverages}}</td>
                                    </tr>
                                    <tr>
                                        <th>Table Qty</th>
                                        <td>{{$data->TablesQty}}</td>
                                    </tr>
                                    <tr>
                                        <th>Chairs Qty</th>
                                        <td>{{$data->ChairsQty}}</td>
                                    </tr>
                                    <tr>
                                        <th>Dining Set Qty</th>
                                        <td>{{$data->DiningSetQty}}</td>
                                    </tr>
                                    <tr>
                                        <th>Decorations</th>
                                        <td>{{$data->Decoration}}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>{{$data->Description}}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{$data->Price}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                         <input type="submit" class="btn btn-primary" />
                                        </td>
                                    </tr>
                                </table>
                               
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection