<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class pokemon extends Model
{
    //
    private $pokemon;

    public function getChain($input)
    {
        $pokeSpecies = Http::get('https://pokeapi.co/api/v2/pokemon-species/' . $input)->object();
        $chainData = Http::get($pokeSpecies->evolution_chain->url)->object();


        $first = [$chainData->chain->species->name, $this->getSprite($chainData->chain->species->name)];

        if (!empty($chainData->chain->evolves_to)) {
            foreach ($chainData->chain->evolves_to as $secEvolution) {
                $second[] = [$secEvolution->species->name, $this->getSprite($secEvolution->species->name)];
            }

            if (isset($chainData->chain->evolves_to[0]->evolves_to)) {
                foreach ($chainData->chain->evolves_to[0]->evolves_to as $thirdEvolution) {
                    $third[] = [$thirdEvolution->species->name, $this->getSprite($thirdEvolution->species->name)];
                }
            } else {
                $third = [];
            }
        } else {
            $second = [];
            $third = [];
        }


        return [
            "first" => $first,
            "second" => $second,
            "third" => $third,
        ];
    }

    public function getSprite($input)
    {
        return Http::get('https://pokeapi.co/api/v2/pokemon/' . $input)->object()->sprites->front_default;

    }
}
