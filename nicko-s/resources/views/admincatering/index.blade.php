@extends('adminlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pending Orders</h6>
        </div>
        <div class="card-body">
        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Package Name</th>
                            <th>Event Date</th>
                            <th>Event Venue</th>
                            <th>total Cost</th>
                            <th>total Payments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pending as $r)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>Package {{$r->package_id}}</td>
                                <td>{{date('Y-m-d h:i a', strtotime($r->event_datetime))}}</td>
                                <td>{{$r->event_address}} {{$r->event_city}} {{$r->event_town}}</td>
                                <td>{{$r->total_price}}</td>
                                <td>{{$r->total_payments}}</td>
                                <td>
                                    <a href="{{url('admin/catering/payment/'.$r->id)}}" type="button" class="btn btn-primary">Add Payment</a>
                                    <a href="{{url('admin/catering/'.$r->id)}}" type="button" class="btn btn-secondary">Details</a>
                                    <a href="{{url('admin/catering/approve/'.$r->id)}}" type="button" class="btn btn-success">Approve</a>
                                    <a href="{{url('admin/catering/cancel/'.$r->id)}}" type="button" class="btn btn-danger">Cancel</a>
                                </td>
                            </tr>
                        @empty
                            <p>Nothing yet</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Approved Orders</h6>
        </div>
        <div class="card-body">
        @if(Session::has('success'))
            <p class="text-success">{{session('success')}}</p>
        @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Package Name</th>
                            <th>Event Date</th>
                            <th>Event Venue</th>
                            <th>total Cost</th>
                            <th>total Payments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($approved as $r)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>Package {{$r->package_id}}</td>
                                <td>{{date('Y-m-d h:i a', strtotime($r->event_datetime))}}</td>
                                <td>{{$r->event_address}} {{$r->event_city}} {{$r->event_town}}</td>
                                <td>{{$r->total_price}}</td>
                                <td>{{$r->total_payments}}</td>
                                <td>
                                    <a href="{{url('admin/catering/payment/'.$r->id)}}" type="button" class="btn btn-primary">Add Payment</a>
                                    <a href="{{url('admin/catering/'.$r->id)}}" type="button" class="btn btn-secondary">Details</a>
                                    <a href="{{url('admin/catering/complete/'.$r->id)}}" type="button" class="btn btn-success">Complete</a>
                                    <a href="{{url('admin/catering/cancel/'.$r->id)}}" type="button" class="btn btn-danger">Cancel</a>
                                </td>
                            </tr>
                        @empty
                            <p>Nothing yet</p>
                        @endforelse
                    </tbody>
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