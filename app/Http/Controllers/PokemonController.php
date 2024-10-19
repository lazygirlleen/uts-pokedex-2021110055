<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
     {
        $this->middleware('auth')->except('index', 'show'); //seluruh fungsi hrs melewati auth kecuali index
    }

    public function index()
    {
        $pokemon = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
                'name' => 'required|string|max:255',
                'species' => 'required|string|max:100',
                'primary_type' => 'required|string|max:50',
                'weight' => 'numeric',
                'height' => 'numeric',
                'hp' => 'integer',
                'attack' => 'integer',
                'defense' => 'integer',
                'is_legendary' => 'required|boolean',
                'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',

        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,svg|max:2048',
            ]);
            $imagePath = $request->file('photo')->storePublicly('public/images');
            $validated['photo'] = $imagePath;
        }

        Pokemon::create([
            'name'=> $validated['name'],
            'species'=> $validated['species'],
            'primary_type'=> $validated['primary_type'],
            'weight'=> $validated['weight'],
            'height'=> $validated['height'],
            'hp'=> $validated['hp'],
            'attack'=> $validated['attack'],
            'defense'=> $validated['defense'],
            'is_legendary'=> $validated['is_legendary'],
            'photo'=> $validated['photo'] ?? null,
        ]);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric',
            'height' => 'numeric',
            'hp' => 'integer',
            'attack' => 'integer',
            'defense' => 'integer',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,svg|max:2048',
            ]);
            $imagePath = $request->file('avatar')->storePublicly('public/images');

            //Hapus file existing
            if($pokemon->photo){
                Storage::delete($pokemon->photo);
            }

            $validated['avatar'] = $imagePath;
        }

        $pokemon->update([
            'name'=> $validated['name'],
            'species'=> $validated['species'],
            'primary_type'=> $validated['primary_type'],
            'weight'=> $validated['weight'],
            'height'=> $validated['height'],
            'hp'=> $validated['hp'],
            'attack'=> $validated['attack'],
            'defense'=> $validated['defense'],
            'is_legendary'=> $validated['is_legendary'],
            'photo'=> $validated['photo'] ?? $pokemon->photo,
        ]);

        return redirect()->route('pokemon.index')->with('success', 'Pokemon update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if($pokemon->photo){
            Storage::delete($pokemon->photo);
        }
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon delete succesfully');
    }
}

