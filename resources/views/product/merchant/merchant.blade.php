@extends('/template/template')

@section('content')

<section class="content">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/responsive.bootstrap4.min.css') }}">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title">Merchant</h3>
            </div>
            <div class="row mt-3">
                <div class="col-6 offset-6 text-right">
                    <a href="{{ url('/product/merchant/create') }}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Add Merchant</a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Merchant Name</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Expire Date</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr class="text-center">
                        <td>{{ $data->merchant_name }}</td>
                        <td>{{ $data->city->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->expired_date }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td class="text-center">
                            <div class="row">
                                <form action="{{ url('/product/merchant/'.$data->id) }}" onsubmit="return confirm('Do you really want to delete it?');" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ url('/product/merchant/'.$data->id.'/edit') }}" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit" style="color: white;"></i></a>
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt" style="color: white;"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}" />

    <!-- DataTables -->
    <script src="{{ url('/adminlte/plugins/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/adminlte/plugins/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/adminlte/plugins/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('/adminlte/plugins/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- AdminLTE App -->

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
</section>

@endsection