<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>File Handling</title>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="card mt-5">
                    <div class="card-body">
                        <center>
                            <h2 class="" style="text-transform: capitalize">Simple Laravel Image Gallery</h2>
                        </center>

                    </div>
                </div>
                <div class="title-wrapper">
                    <h3 class="mt-4 mb-1">Checkout Uploaded Images</h3>
                    <br>
                    <h6 class="pull"><a class="mb-1 btn btn-primary btn-sm" href="{{ route('new-file') }}">Add Photo</a></h6>
                </div>

                <div class="col-md-12">
                    <div class="container">
                        <div class="row">
                            <div class="card1">
                                @forelse ($file as $file)
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img width="400px" height="400px" class="mb-2" src="{{ $file->file }}"
                                                alt="">
                                            <h4 class="mt-2">{{ $file->title }}</h4>
                                        </div>
                                    </div>
                                @empty
                                    No uploaded images.
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</html>
<script src="/bootsrap/js/bootstrap.min.js"></script>
