<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Todo List
            <form action="{{ route('todos.store') }}" method="POST">
                @csrf
                <input type="text" style="width: 100%;" name="title" placeholder="Masukkan kegiatan">
                <button type="submit" class ="btn btn-success btn-sm float-end">Add</button>
            </form>
        </div>
        <div class="card-body">

    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Catatan</th>
                <th>Tenggat</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->description }}</td>
                <td>{{ $todo->due_date }}</td>
                <td>{{ $todo->completed ? 'Selesai' : 'Belum Selesai' }}</td>
                <td>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    <form action="{{ route('todos.updateStatus', $todo->id) }}" method="POST">
    @csrf
    <input type="hidden" name="completed" value="0">
    
    <button type="submit">Ubah Keterangan</button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
@endsection
    
</body>
</html>