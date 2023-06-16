<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('task.update', $data_task->id) }}" method="post” enctype="multipart/formdata">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $data_task->judul) }}" placeholder="Masukkan Judul Task">
                                @error('judul')
                                    <div class="alert alert-danger mt-2">
                                {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Task">{{ old('deskripsi', $data_task->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('task.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css"></script>
</body>
</html>