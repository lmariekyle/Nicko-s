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
                            <h6 class="m-0 font-weight-bold text-primary">View Order
                            <a href="{{url('orders')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card shadow mb-4">
                        <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Food Name</th>
                                            <th>Quantity</th>
                                            <td></td>
                                            <th>Price</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($orders->orderitems as $item)
                                            <tr>
                                                <td>{{$item->food->Name}}</td>
                                                <td>{{$item->food_qty}}</td>
                                                <td></td>
                                                <td>PHP {{$item->price}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <th>Total Price</th>
                                            <th>PHP {{$orders->total_price}}</th>
                                        </tr>
                                    </thead>

                                    <thead>
                                        <tr>
                                            <th>Customer Details</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>

                                    <tbody>   
                                            <tr>
                                                <td>{{$orders->firstname}}</td>
                                                <td>{{$orders->lastname}}</td>
                                                <td>{{$orders->phone}}</td>
                                                <td>{{$orders->email}}</td>
                                            </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                        <th>Customer Address</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>Province</th>
                                            <th>City</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                            <tr>
                                                <td>{{$orders->province}}</td>
                                                <td>{{$orders->city}}</td>
                                                <td>{{$orders->municipality}}</td>
                                                <td>{{$orders->barangay}}</td>
                                            </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Zip Code</th>
                                            <th>Street Name</th>
                                            <th>House Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                            <tr>
                                                <td>{{$orders->zip_code}}</td>
                                                <td>{{$orders->street_name}}</td>
                                                <td>{{$orders->house_number}}</td>
                                                <td></td>
                                            </tr>
                                    </tbody>

                                    <thead>
                                        <label for="" class="mr-3 fs-1">Food Order Status</label>
                                        <form action="{{url('update-order/'.$orders->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        <select name="order_status" id="" class="form-select mb-3 mr-3 p-2">
                                            <option {{$orders->status == '0'? 'selected':'' }} value="0">Pending Payment</option>
                                            <option {{$orders->status == '1'? 'selected':'' }} value="1">Pending Order</option>
                                            <option {{$orders->status == '2'? 'selected':'' }} value="2">Completed</option>
                                            <option {{$orders->status == '3'? 'selected':'' }} value="3">Cancelled</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        </form>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection