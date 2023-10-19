@extends('/template/template')

@section('content')

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Master Status</h3>
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
                <form action="{{ url('orders/master-status') }}" method="post">
                    @csrf
                    <div id="form">
                        <div class="form-group">
                            <label for="name">Nama*</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Nama ..." name="name" value="{{ old('name') }}" required>
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
                            <label for="description">Description*</label>
                            <textarea class="textarea" name="description" placeholder="Enter description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
                            @if ($errors->get('description'))
                            <div class="invalid-feedback" style="display: block;">
                                <ul style="list-style: none;">
                                    @foreach ($errors->get('description') as $errordescription)
                                    <li>{{ $errordescription }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-between mt-5">
                        <a href="{{ url('orders/master-status') }}" type="submit" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
</section>

@endsection