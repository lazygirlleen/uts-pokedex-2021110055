@extends('layouts.app')

@section('title', "Pokemon: $pokemon->name")

@section('content')

<div class="card mt-4">
    @if ($pokemon->photo)

        <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="{{ $pokemon->name }}" class="card-img-top">
    @else

        <img src="{{ asset('images/default-pokemon.png') }}" alt="{{ $pokemon->name }}" class="card-img-top">
    @endif

    <div class="card-body">
        <h5 class="card-title">{{ $pokemon->name }}</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Species</th>
                    <td>{{ $pokemon->species }}</td>
                </tr>
                <tr>
                    <th scope="row">Primary Type</th>
                    <td>{{ $pokemon->primary_type }}</td>
                </tr>
                <tr>
                    <th scope="row">Weight</th>
                    <td>{{ $pokemon->weight }} kg</td>
                </tr>
                <tr>
                    <th scope="row">Height</th>
                    <td>{{ $pokemon->height }} m</td>
                </tr>
                <tr>
                    <th scope="row">HP</th>
                    <td>{{ $pokemon->hp }}</td>
                </tr>
                <tr>
                    <th scope="row">Attack</th>
                    <td>{{ $pokemon->attack }}</td>
                </tr>
                <tr>
                    <th scope="row">Defense</th>
                    <td>{{ $pokemon->defense }}</td>
                </tr>
                <tr>
                    <th scope="row">Is Legendary</th>
                    <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
