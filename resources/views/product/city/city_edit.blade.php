@extends('/template/template')

@section('content')

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit City</h3>
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
                <form action="{{ url('product/city/'.$data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div id="form">
                        <div class="form-group">
                            <label for="name">Nama*</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Nama ..." name="name" value="{{ $data->name }}" required>
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
                            <label for="longitude">Longitude*</label>
                            <input type="text" class="form-control" id="longitude" aria-describedby="longitudeHelp" placeholder="Enter Longitude ..." name="longitude" value="{{ $data->longitude }}" required>
                            @if ($errors->get('longitude'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('longitude') as $errorlongitude)
                                    <li>{{ $errorlongitude }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="latitude">latitude*</label>
                            <input type="text" class="form-control" id="latitude" aria-describedby="latitudeHelp" placeholder="Enter Latitude ..." name="latitude" value="{{ $data->latitude }}" required>
                            @if ($errors->get('latitude'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('latitude') as $errorlatitude)
                                    <li>{{ $errorlatitude }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <a href="{{ url('product/city') }}" type="submit" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
</section>

@endsection