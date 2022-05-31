@extends('layouts.app')

@section('title', 'Apie mus')

@section('content')
    <body class="body-wrapper">


    <section class="section">
        <div class="border">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img height = "200px" width="520px" src="uploads\about\main.png" alt="Error">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <div class="about-content">
                        <h3 class="font-weight-bold text-white" style="padding-top: 35px" >Kas yra Animazer?</h3>
                        <p class="text-white" style="font-size: medium">Animazer - tai patogi parduotuvė visiems jūsų su anime susijusiems daiktams!
                            Apsipirkti čia yra lengva, greita ir patogu! Mes pargabenam prekes iš visos Azijos
                            ir pristatom jas jums prie pat durų!
                           </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading text-center text-capitalize font-weight-bold py-5">
                        <h2 class="text-white">Komandos nariai</h2>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img  src="uploads/about/ciuvas.png" class="fotke" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">Dave Doe</h5>
                            <p class="card-text">Buhalteris</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img  src="uploads/about/ciuvas.png" class="fotke" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">Simon Doe</h5>
                            <p class="card-text">Rinkodara</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img  src="uploads/about/ciuvas.png" class="fotke" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">Tom Doe</h5>
                            <p class="card-text">Vadovas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card my-3 my-lg-0">
                        <img  src="uploads/about/ciuvas.png" class="fotke" alt="Card image cap">
                        <div class="card-body bg-gray text-center">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">
                                Generalinis direktorius</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </body>
@endsection
