@extends('layouts.app')

@section('title', content: "Pokemon: $pokemon->name")

@section('content')

@if ($pokemon->avatar)
    <img src="{{ $pokemon->avatar_url }}" class="rounded img-thumbnail mx-auto d-block my-3"/>
@endif

<table class="table table-bordered">
    <tbody>

    </tbody>
</table>

<div>
 
</div>
@endsection
