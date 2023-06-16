<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
          <a class="navbar-brand text-white" href="{{ route('task.index') }}">Management Task</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item hover-overlay">
                <a class="nav-link text-white" href="{{ route('task.index') }}">All Task <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('task/completed') }}">Completed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('task/incompleted') }}">InCompleted</a>
              </li>
            </ul>
          </div>
        </nav>
        <br>
        <a href="{{ route('task.create') }}" class="btn btn-md btn-success mb-3">Tambah Task</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>DESKRIPSI</th>
                    <th>STATUS</th>
                    <th>SAVE</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <!-- Looping untuk data -->
                @foreach($data_task as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->judul }}</td>
                    <td>{{ $task->deskripsi }}</td>
                    <td>
                    <form action="{{ url('task/' . $task->id . '/status') }}" method="post">
                        @csrf
                        @method('PUT')
                        <select class="form-control" name="status" id="status">
                            <option value="{{ $task->status }}">{{ $task->status }}
                            </option>
                            @if ($task->status == 'InCompleted')
                                <option value="Completed">Completed</option>
                            @else
                                <option value="InCompleted">InCompleted</option>
                            @endif
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success" type="submit" name="create" id='status'>Update</button>
                    </td>
                    </form>
                    <!-- Tombol aksi -->
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('task.destroy', $task->id) }}" method="POST">
                            <a href="{{ route('task.show', $task->id) }}" class="btn btn-sm btn-dark">Show</a>
                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>