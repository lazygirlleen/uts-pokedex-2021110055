@extends('layouts.app')

@section('title', 'Daftar Pokemon')

@section('content')


@if (session()->has('success'))
<div class="alert alert-success mt-4">
    {{ session()->get('success')  }}
</div>

@endif

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title mt-3">Daftar Semua Pokemon</h2>
            <a href="{{ route('pokemon.create') }}" class="btn btn-primary float-right mt-3 mb-3">Tambah Pokemon Baru</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Species</th>
                        <th scope="col">Primary Type</th>
                        <th scope="col">Power</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>



                @forelse ($pokemon as $p)
                <tr>
                    <th scope="row">{{ '#' . Str::padLeft($p->id, 4, '0') }}</th>
                    <td>
                        <a href="{{ route('pokemon.show', $p->id) }}"> <!-- Perbaikan di sini -->
                            {{ $p->name }}
                        </a>
                    </td>
                    <td>{{ $p->species }}</td>
                    <td>{{ $p->primary_type }}</td>
                    <td>{{ $p->hp + $p->attack + $p->defense }}</td>
                    <td>
                        <a href="{{ route('pokemon.edit', $p) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pokemon.destroy', $p) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Pokemon ini?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No pokemon found.</td>
                </tr>
                @endforelse

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $pokemon->links() }}
            </div>
        </div>

    </div>
</div>
@endsection
