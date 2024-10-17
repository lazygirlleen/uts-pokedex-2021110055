@extends('layouts.app')

@section('title', 'Daftar Pokemon')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Pokedex</title>
</head>
<body>
    <div class="container">
        <div class="row g-4">
        @forelse ($pokemon as $p)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $p->photo }}" class="card-img-top" alt="{{ $p->name }}">
                    <div class="card-body">

                        <h5 class="card-title">{{ '#' . Str::padLeft($p->id, 4, '0') }}</h5>

                        <a href="{{ route('pokemon.show', $p->id) }}" class="stretched-link">
                            <h5 class="card-title">{{ $p->name }}</h5>
                        </a>

                        <p class="card-text badge rounded-pill bg-success">{{ $p->primary_type }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No Pokemon found.</p>
            </div>
        @endforelse
        </div>
        {{ $pokemon->links() }}
    </div>
</body>
</html>

@endsection
