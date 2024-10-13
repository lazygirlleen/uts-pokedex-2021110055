<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    public function __construct()
     {
        $this->middleware('auth')->except('index'); //seluruh fungsi hrs melewati auth kecuali index
    }

    public function index()
    {
        // $guests = Guest::all();
        $guests = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dump($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'decimal|max:8|decimal(2)|default(0)',
            'height' => 'decimal|max:8|decimal(2)|default(0)',
            'hp' => 'integer|max:4|default(0)',
            'attack' => 'integer|max:4|default(0)',
            'defense' => 'integer|max:4|default(0)',
            'is_legendary' => 'required|boolean|default(false)'
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
            'hp'=> $validated['hp'],,
            'attack'=> $validated['attack'],
            'defense'=> $validated['defense'],,
            'is_legendary'=> $validated['is_legendary'],
            'photo' => $validated['photo'] ?? null
        ]);

        return redirect()->route('ppokemon.index')->with('success', 'Pokemon added succesfully');
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
            'weight' => 'decimal|max:8|decimal(2)|default(0)',
            'height' => 'decimal|max:8|decimal(2)|default(0)',
            'hp' => 'integer|max:4|default(0)',
            'attack' => 'integer|max:4|default(0)',
            'defense' => 'integer|max:4|default(0)',
            'is_legendary' => 'required|boolean|default(false)'
        ]);

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,svg|max:2048',
            ]);
            $imagePath = $request->file('photo')->storePublicly('public/images');

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
            'hp'=> $validated['hp'],,
            'attack'=> $validated['attack'],
            'defense'=> $validated['defense'],,
            'is_legendary'=> $validated['is_legendary'],
            'photo' => $validated['photo'] ?? $pokemon->photo
        ]);

        return redirect()->route('pokemon.index')->with('success', 'Guest update succesfully');
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
