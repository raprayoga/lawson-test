@extends('/template/template')

@section('content')

<section class="content">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/daterangepicker.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/tempusdominus-bootstrap-4.min.css') }}">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Order</h3>
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
                <form action="{{ url('orders/order-item') }}" method="post">
                    @csrf
                    <div id="form">
                        <div class="form-group">
                            <label for="quantity">Quantity*</label>
                            <input type="number" class="form-control" id="quantity" aria-describedby="quantityHelp" placeholder="Enter Quantity ..." name="quantity" value="{{ old('quantity') }}" required>
                            @if ($errors->get('quantity'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('quantity') as $errorquantity)
                                    <li>{{ $errorquantity }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Product*</label>
                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" name="product_id" style="width: 100%;">
                                <option selected disabled> Select Product </option>
                                @foreach ($datas['products'] as $product)
                                <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->get('product_id'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('product_id') as $errorproduct_id)
                                    <li>{{ $errorproduct_id }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>User*</label>
                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" name="user_id" style="width: 100%;">
                                <option selected disabled> Select User </option>
                                @foreach ($datas['users'] as $user)
                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->get('user_id'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('user_id') as $erroruser_id)
                                    <li>{{ $erroruser_id }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Status*</label>
                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" name="status_id" style="width: 100%;">
                                <option selected disabled> Select Status </option>
                                @foreach ($datas['statuses'] as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->get('status_id'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('status_id') as $errorstatus_id)
                                    <li>{{ $errorstatus_id }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Date*</label>
                            <div class="input-group date" id="date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Enter Date" data-target="#date" name="date" value="{{ old('date') }}" required />
                                <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @if ($errors->get('date'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('date') as $errordate)
                                    <li>{{ $errordate }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <a href="{{ url('orders/order-item') }}" type="submit" class="btn btn-danger">Cancel</a>
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
    $('#date').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>

@endsection