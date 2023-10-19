@extends('/template/template')

@section('content')

<section class="content">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/daterangepicker.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/tempusdominus-bootstrap-4.min.css') }}">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Users</h3>
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
                <form action="{{ url('users/'.$data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div id="form">
                        <div class="form-group">
                            <label for="full_name">Full Nama*</label>
                            <input type="text" class="form-control" id="full_name" aria-describedby="full_nameHelp" placeholder="Enter Nama ..." name="full_name" value="{{ $data->full_name }}" required>
                            @if ($errors->get('full_name'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('full_name') as $errorfull_name)
                                    <li>{{ $errorfull_name }}</li>
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
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="{{ $data->email }}" required>
                            @if ($errors->get('email'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('email') as $erroremail)
                                    <li>{{ $erroremail }}</li>
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
                            <label>Tgl Lahir*</label>
                            <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#date_of_birth" name="date_of_birth" id="date_of_birth_value" value="{{ $data->date_of_birth }}" required />
                                <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @if ($errors->get('date_of_birth'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('date_of_birth') as $errordate_of_birth)
                                    <li>{{ $errordate_of_birth }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="active">Active*</label>
                            <select class="custom-select" id="active" name="active" required>
                                <option selected>Choose...</option>
                                <option value="y" <?php if ($data->active  == 'y') echo 'selected' ?>>Yes</option>
                                <option value="n" <?php if ($data->active  == 'n') echo 'selected' ?>>No</option>
                            </select>
                            @if ($errors->get('active'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('active') as $erroractive)
                                    <li>{{ $erroractive }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <a href="{{ url('users') }}" type="submit" class="btn btn-danger">Cancel</a>
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
    $('#date_of_birth').datetimepicker({
        format: 'YYYY-MM-DD'
    });
</script>
@endsection