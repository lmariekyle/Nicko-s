@extends('adminlayout')
@section('content')

<style>

.feature {

  background-color: #4e73df;
  border: none;
  color: white;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  border-radius: .2rem;

}

.unfeature {

  background-color: #e74a3b;
  border: none;
  color: white;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  border-radius: .2rem;

}

</style>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Avatar</th>
                                          <th>Name</th>
                                          <th>Testimonial</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>#</th>
                                          <th>Avatar</th>
                                          <th>Name</th>
                                          <th>Testimonial</th>
                                          <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($dataT)
                                        @foreach($dataT as $d)
                                        <tr>
                                          <td>{{$d->id}}</td>
                                          <td><img src="{{asset('img/'.$d->image)}}" width="50" height="50"></td>
                                          <td>{{$d->firstname}} {{$d->middlename}} {{$d->lastname}}</td>
                                          <td>{{$d->testimonial}}</td>
                                          <td>
                                            <form method="POST" action="{{url('admin/customers/feature/'.$d->id).''}}">
                                              @csrf
                                              @method('PUT')
                                              <button type="submit" class = "feature" <?php echo($d->feature_testimonial == 1 ? "hidden" : "") ?>>Feature</button>
                                            </form>

                                            <form method="POST" action="{{url('admin/customers/unfeature/'.$d->id).''}}" >
                                              @csrf
                                              @method('PUT')
                                              <button type="submit" class = "unfeature" <?php echo($d->feature_testimonial == 0 ? "hidden" : "") ?>>Unfeature</button>
                                            </form>
                                          </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
