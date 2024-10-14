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
                <input type="text" class="form-control" id="guest_name" placeholder="Name" name="name" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
                <label for="species">Species</label>
                <input type="text" class="form-control" id="species" placeholder="species" name="species" required value="{{ old('species') }}">
        </div>

        <label for="species">Primary type</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">Grass</option>
            <option value="2">Fire</option>
            <option value="3">Water</option>
            <option value="4">Bug</option>
            <option value="5">Water</option>
            <option value="6">Water</option>
            <option value="7">Water</option>
            <option value="8">Water</option>
            <option value="9">Water</option>
            <option value="10">Water</option>
            <option value="11">Water</option>
            <option value="12">Water</option>
            <option value="13">Water</option>
            <option value="14">Water</option>
            <option value="15">Water</option>
            <option value="16">Water</option>
            <option value="17">Water</option>
            <option value="18">Water</option>
        </select>

        <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" id="weight" placeholder="weight" name="weight" value="{{ old('weight') }}">
        </div>

        <div class="form-group">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height" placeholder="height" name="height" value="{{ old('height') }}">
        </div>

        <div class="form-group">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height" placeholder="height" name="height" value="{{ old('height') }}">
        </div>
        <div class="form-group">
                <label for="height">Hp</label>
                <input type="number" class="form-control" id="height" placeholder="height" name="height" value="{{ old('height') }}">
        </div>
        <div class="form-group">
                <label for="height">Attack</label>
                <input type="number" class="form-control" id="height" placeholder="height" name="height" value="{{ old('height') }}">
        </div>
        <div class="form-group">
                <label for="height">Defense</label>
                <input type="number" class="form-control" id="height" placeholder="height" name="height" value="{{ old('height') }}">
        </div>

        <div class="form-group">
                <label for="species">Is legendary</label>
                <input type="text" class="form-control" id="species" placeholder="species" name="species" required value="{{ old('species') }}">
        </div>

        <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="avatar"  name="avatar">
        </div>


            <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
        </form>
    </div>
</div>

@endsection
