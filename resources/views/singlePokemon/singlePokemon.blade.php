@extends('layout.base')
@section('content')
    <h1 class="container"> {{ $response->name }} ID: {{ $response->id }} </h1>
    <img src="{{ $response->sprites->front_default }}" alt="">
    <ul>
        @for ($i = 0; $i < 4; $i++)
            <li>
                {{ $response->moves[$i]->move->name }}
            </li>
        @endfor
    </ul>
    <h2>EVOLUTION CHAIN</h2>
    <h3>First Generation</h3>
    <p>{{ $chain['first'][0] }}</p>
    <img src="{{ $chain['first'][1] }}" alt="">
    <h4>Second Generation</h4>
    @foreach($chain['second'] as $pokeData)
        <p>{{ $pokeData[0] }}</p>
        <img src="{{ $pokeData[1] }}" alt="">
    @endforeach
    <h5>Third Generation</h5>

    @foreach($chain['third'] as $pokeData)
        <p>{{ $pokeData[0] }}</p>
        <img src="{{ $pokeData[1] }}" alt="">
    @endforeach

@endsection
