<?php

namespace App\Http\Controllers;

use App\pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;

class HomepageController extends Controller
{
    public function index()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon?offset=0&limit=30')->object();
        foreach ($response->results as $poke) {
            $allPokemon[] = Http::get($poke->url)->object();
            $pokemon = new pokemon();
            $pokemon->pokemon = $poke->name;
            try {
                $pokemon->save();
            } catch (QueryException $e) {
                $e;
            }

        }

        return view('homepage.homepage', [
            'allPoke' => $allPokemon,
        ]);
    }
}
