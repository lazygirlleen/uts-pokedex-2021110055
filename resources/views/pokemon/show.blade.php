@extends('layouts.app')

@section('title', "Pokemon: $p->name")

@section('content')

<div class="card mt-4">
    @if ($p->photo)

        <img src="{{ asset('storage/' . $p->photo) }}" alt="{{ $p->name }}" class="card-img-top">
    @else

        <img src="{{ asset('images/default-pokemon.png') }}" alt="{{ $p->name }}" class="card-img-top">
    @endif

    <div class="card-body">
        <h5 class="card-title">{{ $p->name }}</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Species</th>
                    <td>{{ $p->species }}</td>
                </tr>
                <tr>
                    <th scope="row">Primary Type</th>
                    <td>{{ $p->primary_type }}</td>
                </tr>
                <tr>
                    <th scope="row">Weight</th>
                    <td>{{ $p->weight }} kg</td>
                </tr>
                <tr>
                    <th scope="row">Height</th>
                    <td>{{ $p->height }} m</td>
                </tr>
                <tr>
                    <th scope="row">HP</th>
                    <td>{{ $p->hp }}</td>
                </tr>
                <tr>
                    <th scope="row">Attack</th>
                    <td>{{ $p->attack }}</td>
                </tr>
                <tr>
                    <th scope="row">Defense</th>
                    <td>{{ $p->defense }}</td>
                </tr>
                <tr>
                    <th scope="row">Is Legendary</th>
                    <td>{{ $p->is_legendary ? 'Yes' : 'No' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
