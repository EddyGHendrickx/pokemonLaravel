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
    <h1 class="container text-center"> {{ $response->name }} ID: {{ $response->id }} </h1>

    <div class="d-flex justify-content-center align-content-center m-auto mb-4">
        <img src="{{ $response->sprites->front_default }}" style="height: auto; width: 100px" alt="">
        <ul>
            @for ($i = 0; $i < 4; $i++)
                <li>
                    {{ $response->moves[$i]->move->name }}
                </li>
            @endfor
        </ul>
    </div>

    <h2 class="text-center m-auto">EVOLUTION CHAIN</h2>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container align-middle m-auto text-center">

                    <h3>First Generation</h3>
                    <p>{{ $chain['first'][0] }}</p>
                    @if ( $response->name == $chain['first'][0] )
                        <img src="{{ $chain['first'][1] }}" alt="First Slide" class="bg-success rounded-circle ">
                    @else
                        <img src="{{ $chain['first'][1] }}" alt="First Slide">
                    @endif
                </div>
            </div>
            @if( !empty($chain['second']) )

                <div class="carousel-item ">
                    <h4 class="text-center m-auto">Second Generation</h4>

                    <div class="container d-flex text-center flex-row m-auto">

                        @foreach($chain['second'] as $pokeData)
                            <div class="d-flex flex-column text-center m-auto">
                                <p>{{ $pokeData[0] }}</p>

                                @if ( $response->name == $pokeData[0] )
                                    <img src="{{ $pokeData[1] }}" alt="First Slide" class="bg-success rounded-circle ">
                                @else
                                    <img src="{{ $pokeData[1] }}" alt="First Slide">
                                @endif
                            </div>

                        @endforeach
                    </div>
                </div>
            @endif
            @if( !empty($chain['third']) )

                <div class="carousel-item ">
                    <h4 class="text-center m-auto">Third Generation</h4>

                    <div class="container d-flex text-center flex-row m-auto">

                        @foreach($chain['third'] as $pokeData)
                            <div class="d-flex flex-column text-center m-auto">

                                <p>{{ $pokeData[0] }}</p>

                                @if ( $response->name == $pokeData[0] )
                                    <img src="{{ $pokeData[1] }}" alt="First Slide" class="bg-success rounded-circle ">
                                @else
                                    <img src="{{ $pokeData[1] }}" alt="First Slide">
                                @endif
                            </div>

                        @endforeach
                    </div>
                </div>
            @endif

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
