<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pokeSearch extends Controller
{
    public function index()
    {
        $input = $_POST['pokeSearch'];
        return \Redirect::route('route.onePokemon', $input);
    }

}
