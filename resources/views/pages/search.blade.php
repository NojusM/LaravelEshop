@extends('layouts.app')

@section('title', 'Paieška')

@section('content')
    <div class="container">
        @if (session()-> has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <body class="body-wrapper">
    <div class="bg-2">
        <section class="section-sm">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar">
                        <div class="widget category-list">
                            <h4 class="widget-header">Paieška</h4>
                            <ul class="category-list">
                                <form action="{{route ('search')}}" method="GET" id="searchForm">
                                    <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="range-track w-100" placeholder="Paieška">
                                </form>
                                <button type="submit" form="searchForm" style="width: 195px; margin-top: 5px" value="Submit">Ieškoti</button>
                            </ul>
                        </div>
                        <div class="widget category-list">
                            <h4 class="widget-header">Kaina</h4>
                            <ul class="category-list">
                                <form action="{{route ('search')}}" method="GET" id="priceForm">
                                    <input type="text" name="queryMin" id="queryMin" value="{{request()->input('queryMin')}}" style="width: 95px" placeholder="min">
                                    <input type="text" name="queryMax" id="queryMax" value="{{request()->input('queryMax')}}" style="width: 95px" placeholder="max">
                                </form>
                                <button type="submit" form="priceForm" style="width: 195px; margin-top: 5px" value="Submit">Ieškoti</button>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <!-- ad listing list  -->
                    @forelse ($products as $item)
                        <div class="ad-listing-list mt-20">
                            <div class="row p-lg-3 p-sm-5 p-4">
                                <div class="col-lg-4 align-self-center">
                                    <a href="{{route('figureles.show', $item->title)}}">
                                        <img src="{{asset('uploads/animeimg/'.$item->animeimg)}}" class="img-fluid" alt="aaaaa">
                                    </a>
                                </div>
                                <div class="col-lg-8">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-10">
                                            <div class="ad-listing-content">
                                                <div>
                                                    <a href="{{route('figureles.show', $item->title)}}" class="font-weight-bold">{{ $item-> title }}</a>
                                                </div>
                                                <ul class="list-inline mt-2 mb-3">
                                                    {{--                                                    <li class="list-inline-item"><a href="category.html"> Type: {{ $item->type->title }}</a></li>--}}
                                                    <li class="list-inline-item"><a href=""> {{ $item->price }} $</a></li>
                                                </ul>
                                                <p class="pr-5">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 align-self-center" style="padding-right: 50px">
                                            <div class="product-ratings float-lg-right pb-3">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item selected"><i class="fa fa-star" style="color: gold"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star" style="color: gold"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star" style="color: gold"></i></li>
                                                    <li class="list-inline-item selected"><i class="fa fa-star" style="color: gold"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star" ></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div style="text-align: left">Prekių nerasta</div>
                    @endforelse
                <!-- ad listing list  -->


{{--                    {{ $products->links('pagination::bootstrap-4') }}--}}
                </div>
            </div>

        </section>
    </div>
    </body>
@endsection
