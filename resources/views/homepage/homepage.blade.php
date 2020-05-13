@extends('layout.base')
@section('content')
    <style>
        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23f00' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23f00' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
        }

    </style>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-30 align-middle m-auto"
                     style="width: auto; height: 100px"
                     src="https://pluspng.com/img-png/pokemon-logo-png-pokemon-logo-png-2000.png"
                     alt="First slide">
            </div>

            @foreach($allPoke as $poke)

                <div class="carousel-item">
                    <div class="container align-middle m-auto text-center pokeContainer">
                        <img class="d-block w-30 align-middle m-auto pokeImage"
                             src="{{ $poke->sprites->front_default }}"
                             alt="First slide">
                        <a class="align-content-center text-center m-auto pokeName"
                           href="{{ route('route.onePokemon', $poke->id) }}">{{ $poke->name }}</a>
                        <p class="pokeMove1">{{ $poke->moves[0]->move->name }}</p>
                        <p class="pokeMove2">{{ $poke->moves[1]->move->name }}</p>
                        <p class="pokeMove3">{{ $poke->moves[2]->move->name }}</p>
                        <p class="pokeMove4">{{ $poke->moves[3]->move->name }}</p>

                    </div>
                </div>

            @endforeach
        </div>
        <div class="bg-dark">
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
        </div>
        <div class="bg-dark">
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
