<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
        <h2>Tambah Task</h2>

        <form action="{{ route('task.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan Judul Task">
                @error('judul')
                <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
                @enderror

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi Task"></textarea>
                @error('judul')
                <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
                @enderror
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="InCompleted">InCompleted</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('task.index') }}" class="btn btn-md btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>