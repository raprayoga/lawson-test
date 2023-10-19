@extends('/template/template')

@section('content')

<section class="content">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/select2.css') }}">
    <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/select2-bootstrap4.min.css') }}">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title">Export Sales</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('report/export-sales') }}" method="post" id="form">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="daterange">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <select class="custom-select" id="based_on" name="based_on" required>
                                <option selected>Based On...</option>
                                <option value="product" <?php if (old('based_on')  == 'product') echo 'selected' ?>>product</option>
                                <option value="month" <?php if (old('based_on')  == 'month') echo 'selected' ?>>month</option>
                                <option value="city" <?php if (old('based_on')  == 'city') echo 'selected' ?>>city</option>
                                <option value="user" <?php if (old('based_on')  == 'user') echo 'selected' ?>>user</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block">
                            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            Export
                        </button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <!-- InputMask -->
    <script src="{{ url('/adminlte/plugins/js/moment.min.js') }}"></script>
    <script src="{{ url('/adminlte/plugins/js/jquery.inputmask.bundle.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ url('/adminlte/plugins/js/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('/adminlte/plugins/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ url('/adminlte/plugins/js/select2.full.min.js') }}"></script>


    <script>
        $('#reservation').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            }
        })
    </script>
</section>

@endsection