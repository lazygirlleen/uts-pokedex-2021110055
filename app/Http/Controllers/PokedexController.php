<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    /**
     * Handle the single action.
     */
    public function index()
    {
        $pokemon = Pokemon::paginate(20);
        return view('pokedex', compact('pokemon'));
    }
}
