@extends('/template/template')

@section('content')

<section class="content">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/daterangepicker.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/tempusdominus-bootstrap-4.min.css') }}">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Merchant</h3>
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
                <form action="{{ url('product/merchant/'.$data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div id="form">
                        <div class="form-group">
                            <label for="merchant_name">Merchant Nama*</label>
                            <input type="text" class="form-control" id="merchant_name" aria-describedby="merchant_nameHelp" placeholder="Enter Nama ..." name="merchant_name" value="{{ $data->merchant_name }}" required>
                            @if ($errors->get('merchant_name'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('merchant_name') as $errormerchant_name)
                                    <li>{{ $errormerchant_name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone*</label>
                            <input type="number" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Enter Phone" name="phone" value="{{ $data->phone }}" required>
                            @if ($errors->get('phone'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('phone') as $errorphone)
                                    <li>{{ $errorphone }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address*</label>
                            <textarea class="textarea" name="address" placeholder="Enter Address" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->address }}</textarea>
                            @if ($errors->get('address'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('address') as $erroraddress)
                                    <li>{{ $erroraddress }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>City*</label>
                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" name="city_id" style="width: 100%;">
                                <option selected disabled> Select City </option>
                                @foreach ($data['cities'] as $city)
                                <option value="{{ $city->id }}" <?php if ($data->city_id == $city->id) echo 'selected' ?>>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->get('city_id'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('city_id') as $errorcity_id)
                                    <li>{{ $errorcity_id }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Expired Date*</label>
                            <div class="input-group date" id="expired_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Enter Tgl Lahir" data-target="#expired_date" name="expired_date" value="{{ $data->expired_date }}" required />
                                <div class="input-group-append" data-target="#expired_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @if ($errors->get('expired_date'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('expired_date') as $errorexpired_date)
                                    <li>{{ $errorexpired_date }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <a href="{{ url('product/merchant') }}" type="submit" class="btn btn-danger">Cancel</a>
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