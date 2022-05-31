@extends('layouts.app')

@section('title', $product->title)

@section('content')

    <body class="body-wrapper">


    <section class="section bg-white">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">

                        <!-- product slider -->
                        <div>
                            <img class="img-fluid h-200 w-100" src="{{asset('uploads/animeimg/'.$product->animeimg)}}" alt="product-img">
                        </div>
                        <!-- product slider -->

                        <div class="content mt-5 pt-5">
                            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                       aria-selected="true">Aprašymas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                       aria-selected="false">Specifikacijos</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h3 class="tab-title">Prekės Aprašymas</h3>
                                    <p> {{$product->description}}</p>


                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <h3 class="tab-title">Prekės Specifikacijos</h3>
                                    <table class="table table-bordered product-table">
                                        <tbody>
                                        <tr>
                                            <td>Kaina</td>
                                            <td>{{ $product->price }} $</td>
                                        </tr>
                                        <tr>
                                            <td>Kategorija</td>
                                            <td>{{ $product->category->title }} </td>
                                        </tr>
                                        <tr>
                                            <td>Tipas</td>
                                            <td>{{ $product->type->title }} </td>
                                        </tr>
                                        <tr>
                                            <td>Liko</td>
                                            <td>{{ $product->quantity }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="text-center">
                            @auth
                                <form action="{{route('krepselis.store')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="title" value="{{$product->title}}">
                                    <input type="hidden" name="price" value="{{$product->price}}">
{{--                                    <select name="qty" id="qty">--}}
{{--                                        <option value="1">1</option>--}}
{{--                                        <option value="2">2</option>--}}
{{--                                        <option value="3">3</option>--}}
{{--                                    </select>--}}
                                    <button type="submit" class="buttonX" >Į krepšelį</button>
                                </form>

                            @else
                                <h4> <a class="h1 text-md-center text-red-600" href="{{ url('/login') }}">Prisijungti</a></h4>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Container End -->
    </section>

    <!-- JAVASCRIPTS -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/popper.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
    <!-- tether js -->
    <script src="plugins/tether/js/tether.min.js"></script>
    <script src="plugins/raty/jquery.raty-fa.js"></script>
    <!-- <script src="plugins/slick-carousel/slick/slick.min.js"></script> -->
    <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
    <script src="plugins/google-map/gmap.js"></script>
    <script src="js/script.js"></script>
    </body>
@endsection
