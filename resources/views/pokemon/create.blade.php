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


            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
