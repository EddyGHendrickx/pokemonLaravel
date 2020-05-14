<?php

namespace App\Http\Controllers;
use App\pokemon;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;



class singlePokemon extends Controller
{
    public function index($id)
    {

        $generalInfo = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id)->object();

        if (!Http::get('https://pokeapi.co/api/v2/pokemon-species/'. $id)->object()){
            return redirect()->back()->withErrors(['noFound' => 'No poke was found']);
        }

        $chainURL = Http::get('https://pokeapi.co/api/v2/pokemon-species/'. $id)->object()->evolution_chain->url;

        $chainData = Http::get($chainURL)->object();

        $pokemon = new pokemon();
        $chain = $pokemon->getChain($id);

        return view('singlePokemon.singlePokemon', [
            'response' => $generalInfo,
            'chainData' => $chainData,
            'chain' => $chain,

        ]);
    }
}
