@extends('layouts.app')

@section('title', 'Pokemon List')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Pokemon</h1>

    <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">
        Create New Pokemon
    </a>
</div>


@if (session()->has('success'))
<div class="alert alert-success mt-4">
    {{ session()->get('success')  }}
</div>

@endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>


    </table>
    <div class="d-flex justify-content-center">
        {!! $pokemon->links() !!}
    </div>
</div>
@endsection

