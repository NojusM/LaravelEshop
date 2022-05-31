@extends('layouts.app')

@section('title', 'Pagrindinis')

@section('content')

    <body class="body-wrapper">

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 style="font-size: 40px">Sveiki atvyke į Animazer</h2>
                        <p>Šiuo metu karščiausi daiktai!</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- product card -->
                <div class="column">
                <div class="product-item bg-light">
                    <div class="card">
                        <div class="thumb-content">
                            <a href="{{ url('/figureles_shop') }}">
                                <img class="card-img-top img-fluid fotke2" src="uploads/about/main1.png"
                                     alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-md-center"><a href="{{ url('/figureles_shop') }}">Kolekcinės figurėlės</a></h4>
                            <ul class="list-inline product-meta">
                            </ul>
                            <p class="card-text text-md-center">Pritrauks svečių dėmesį!</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="column">
                <div class="product-item bg-light">
                    <div class="card">
                        <div class="thumb-content">
                            <a href="{{ url('/rytu_shop') }}">
                                <img class="card-img-top img-fluid fotke2" src="uploads/about/main2.png"
                                     alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-md-center"><a href="{{ url('/rytu_shop') }}">Rytų virtuvė</a></h4>
                            <ul class="list-inline product-meta">
                            </ul>
                            <p class="card-text text-md-center">Paragaukit neragautų skonių!</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>


    </body>

@endsection
