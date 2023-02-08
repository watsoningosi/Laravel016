@extends('layout')

@section('body')
    <div class="col-md-12">
        <div class="container">
            <div class="row">

                <div class="card mt-5">
                    <div class="card-header">
                        <h1 class="center">Add photo to gallery</h1>
                   
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="{{ route('file') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="file" id="file">
                                    <small class="form-text text-muted">Please upload a valid image file. Size of image
                                        should not be more than 2MB.</small>
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="name" name="title">
                                <button type="submit" class="btn btn-warning mt-2">Submit</button>

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
