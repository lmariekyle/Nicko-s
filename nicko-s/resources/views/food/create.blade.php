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
                            <h6 class="m-0 font-weight-bold text-primary">Add Food 
                            <a href="{{url('admin/food')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{url('admin/food')}}">
                                @csrf
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Food Name</th>
                                        <td><input name="foodname" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><textarea name="ingredients" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><textarea name="price" class="form-control"></textarea></td>
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