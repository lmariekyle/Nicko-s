@extends('adminlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catering Order Details</h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <div class="table-responsive">
                <form method="post" action="{{url('admin/catering/payment/'.$c->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Total Cost</th>
                                <td>{{$c->total_price}}</td>
                            </tr>
                            <tr>
                                <th>Total Payments</th>
                                <td>{{$c->total_payments}}</td>
                            </tr>
                            <tr>
                                <th>Add New Payment</th>
                                <td><input value="0" name="new_payments" type="number" class="form-control"/></td>
                            </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Add Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection
@endsection