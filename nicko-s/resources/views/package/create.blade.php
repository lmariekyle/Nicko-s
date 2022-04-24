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
                            <h6 class="m-0 font-weight-bold text-primary">Add Package
                            <a href="{{url('admin/package')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{url('admin/package')}}">
                                @csrf
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <th>Package Name</th>
                                        <td><input name="packagename" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Lechon Quantity</th>
                                        <td><input name="lechonqty" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Food Quantity</th>
                                        <td><input name="foodqty" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Foods Included</th>
                                        <td><textarea name="foods" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Dessert Quantity</th>
                                        <td><input name="dessertqty" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Desserts Included</th>
                                        <td><textarea name="desserts" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Beverage Quantity</th>
                                        <td><input name="beverageqty" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Beverages Included</th>
                                        <td><textarea name="beverages" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Table Quantity</th>
                                        <td><input name="tables" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Chair Quantity</th>
                                        <td><input name="chairs" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Dining Set Quantity</th>
                                        <td><input name="diningset" type="text" class="form-control"/></td>
                                    </tr>
                                    <tr>
                                        <th>Decoration</th>
                                        <td><textarea name="decoration" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><textarea name="description" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Package Price</th>
                                        <td><input name="price" type="text" class="form-control"/></td>
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