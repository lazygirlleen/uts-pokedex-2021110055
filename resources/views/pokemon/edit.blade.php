@extends('layouts.app')

@section('title', 'Edit Pokemon')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Edit Pokemon</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $pokemon->name) }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="species">Species</label>
                <input type="text" class="form-control" id="species" name="species" placeholder="Species" value="{{ old('species', $pokemon->species) }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="primary_type">Primary Type</label>
                <select class="form-select" id="primary_type" name="primary_type" required>
                    <option disabled>Choose a type</option>
                    @foreach (['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                        <option value="{{ $type }}" {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Weight" value="{{ old('weight', $pokemon->weight) }}">
            </div>

            <div class="form-group mt-3">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height" name="height" placeholder="Height" value="{{ old('height', $pokemon->height) }}">
            </div>

            <div class="form-group mt-3">
                <label for="hp">HP</label>
                <input type="number" class="form-control" id="hp" name="hp" placeholder="HP" value="{{ old('hp', $pokemon->hp) }}">
            </div>

            <div class="form-group mt-3">
                <label for="attack">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" placeholder="Attack" value="{{ old('attack', $pokemon->attack) }}">
            </div>

            <div class="form-group mt-3">
                <label for="defense">Defense</label>
                <input type="number" class="form-control" id="defense" name="defense" placeholder="Defense" value="{{ old('defense', $pokemon->defense) }}">
            </div>

            <div class="form-group mt-3">
                <label for="is_legendary">Is Legendary</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_legendary" id="legendary_yes" value="1" {{ old('is_legendary', $pokemon->is_legendary) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="legendary_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_legendary" id="legendary_no" value="0" {{ old('is_legendary', $pokemon->is_legendary) == 0 ? 'checked' : '' }}>
                    <label class="form-check-label" for="legendary_no">No</label>
                </div>
            </div>


            <div class="form-group mt-3">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
        </form>
    </div>
</div>

@endsection
