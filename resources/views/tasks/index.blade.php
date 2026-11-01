@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h4>To-Do List</h4>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text"
                                name="title"
                                class="form-control"
                                placeholder="Masukkan tugas baru...">

                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                        @error('title')
                            <div class="text-danger mb-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </form>

                    @forelse($tasks as $task)

                        <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-2">

                            <div>
                                @if($task->status)
                                    <span class="text-decoration-line-through text-muted">
                                        {{ $task->title }}
                                    </span>
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span>{{ $task->title }}</span>
                                    <span class="badge bg-warning text-dark">Belum Selesai</span>
                                @endif
                            </div>

                            <div class="d-flex gap-2">

                                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-sm btn-success">
                                        {{ $task->status ? 'Batalkan' : 'Selesai' }}
                                    </button>
                                </form>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>

                            </div>
                        </div>

                    @empty

                        <div class="text-center text-muted py-4">
                            Belum ada tugas. Silakan tambahkan tugas!
                        </div>

                    @endforelse

                </div>
            </div>

        </div>
    </div>

</div>
@endsection