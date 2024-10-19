@extends('layouts.app')

@section('title', 'Input New Pokemon')

@section('content')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Input New Pokemon</h1>
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

        <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required value="{{ old('name') }}">
            </div>

            <div class="form-group mt-3">
                <label for="species">Species</label>
                <input type="text" class="form-control" id="species" placeholder="Species" name="species" required value="{{ old('species') }}">
            </div>

            <div class="form-group mt-3">
                <label for="primary_type">Primary Type</label>
                <select class="form-select" id="primary_type" name="primary_type" required>
                    <option selected disabled>Choose a type</option>
                    <option value="Grass">Grass</option>
                    <option value="Fire">Fire</option>
                    <option value="Water">Water</option>
                    <option value="Bug">Bug</option>
                    <option value="Normal">Normal</option>
                    <option value="Poison">Poison</option>
                    <option value="Electric">Electric</option>
                    <option value="Ground">Ground</option>
                    <option value="Fairy">Fairy</option>
                    <option value="Fighting">Fighting</option>
                    <option value="Psychic">Psychic</option>
                    <option value="Rock">Rock</option>
                    <option value="Ghost">Ghost</option>
                    <option value="Ice">Ice</option>
                    <option value="Dragon">Dragon</option>
                    <option value="Dark">Dark</option>
                    <option value="Steel">Steel</option>
                    <option value="Flying">Flying</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" id="weight" placeholder="Weight" name="weight" value="{{ old('weight') }}">
            </div>

            <div class="form-group mt-3">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height" placeholder="Height" name="height" value="{{ old('height') }}">
            </div>

            <div class="form-group mt-3">
                <label for="hp">HP</label>
                <input type="number" class="form-control" id="hp" placeholder="HP" name="hp" value="{{ old('hp') }}">
            </div>

            <div class="form-group mt-3">
                <label for="attack">Attack</label>
                <input type="number" class="form-control" id="attack" placeholder="Attack" name="attack" value="{{ old('attack') }}">
            </div>

            <div class="form-group mt-3">
                <label for="defense">Defense</label>
                <input type="number" class="form-control" id="defense" placeholder="Defense" name="defense" value="{{ old('defense') }}">
            </div>

            <div class="form-group mt-3">
                <label for="is_legendary">Is Legendary</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_legendary" id="legendary_yes" value="1">
                    <label class="form-check-label" for="legendary_yes">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_legendary" id="legendary_no" value="0" checked>
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

