<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>{{ $data_task->judul }}</h4>
                        <p class="tmt-3">
                        {!! $data_task->deskripsi !!}
                        </p>
                        <p class="tmt-3">
                        {!! $data_task->status !!}
                        </p>
                        <a href="{{ route('task.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</html>