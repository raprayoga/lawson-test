@extends('/template/template')

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Apply Career</span>
                        <span class="info-box-number">
                            10
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Career Open Position</span>
                        15
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/adminlte/plugins/js/moment.min.js') }}"></script>
    <script src="{{ url('/adminlte/plugins/js/Chart.min.js') }}"></script>
</section>

@endsection
