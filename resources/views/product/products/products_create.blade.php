@extends('/template/template')

@section('content')

<section class="content">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/daterangepicker.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/tempusdominus-bootstrap-4.min.css') }}">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Products</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="text-center">
                @if (count($errors))
                <div class="alert alert-danger">
                    {{ $errors }}
                </div>
                @endif
            </div>

            <div class="container">
                <form action="{{ url('product/products/') }}" method="post">
                    @csrf
                    <div id="form">
                        <div class="form-group">
                            <label for="name">Nama*</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Nama ..." name="name" required>
                            @if ($errors->get('name'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('name') as $errorname)
                                    <li>{{ $errorname }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Merchant*</label>
                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" name="merchant_id" style="width: 100%;">
                                <option selected disabled> Select Merchant </option>
                                @foreach ($datas['merchants'] as $merchant)
                                <option value="{{ $merchant->id }}">{{ $merchant->merchant_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->get('merchant_id'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('merchant_id') as $errormerchant_id)
                                    <li>{{ $errormerchant_id }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <a href="{{ url('product/products') }}" type="submit" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
</section>

<!-- InputMask -->
<script src="{{ url('/adminlte/plugins/js/moment.min.js') }}"></script>
<script src="{{ url('/adminlte/plugins/js/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ url('/adminlte/plugins/js/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('/adminlte/plugins/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script>
    //Date picker
    $('#expired_date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
@endsection