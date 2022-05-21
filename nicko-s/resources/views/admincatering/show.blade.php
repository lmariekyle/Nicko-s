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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    @if($c && $cd) 
                        <tr>
                            <th>Customer Name</th>
                            <td>{{$cus->firstname}} {{$cus->middlename}} {{$cus->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Customer Phone</th>
                            <td>{{$cus->phone}}</td>
                        </tr>
                        <tr>
                            <th>Customer Email</th>
                            <td>{{$cus->email}}</td>
                        </tr>
                        <tr>
                            <th>Allergies</th>
                            <td>{{$cd->customer_allergies}}</td>
                        </tr>
                        <tr>
                            <th>Additional Notes</th>
                            <td>{{$cd->customer_notes}}</td>
                        </tr>
                        <tr>
                            <th>Event Type</th>
                            <td>{{$cd->event_type}}</td>
                        </tr>
                        <tr>
                            <th>Order Made on</th>
                            <td>{{date('Y-m-d h:i a', strtotime($c->created_at))}}</td>
                        </tr>
                    @endif
                </table>
               
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