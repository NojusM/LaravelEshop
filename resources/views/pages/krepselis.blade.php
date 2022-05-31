@extends('layouts.app')

@section('title', 'Apie mus')

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
    </div>
        @endif


    <body>
    @if(Cart::count() > 0)
        <h1> Turite {{Cart::count()}} prekes krepšelyje</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-light">
            <thead>
            <tr>
                <th></th>
                <th>Prekė</th>
{{--                <th>Kiekis</th>--}}
                <th>Kaina</th>
            </tr>
            </thead>
            <tbody>
            @foreach(Cart::content() as $item)
                <tr class="text-center">
                    <td><a href="{{route('figureles.show',$item->model->title)}}"><img width="100px" height="100px" src="{{ url('uploads/animeimg', $item->model->animeimg) }}"></a></td>
                    <td style="vertical-align: middle"><a href="{{route('figureles.show',$item->model->title)}}">{{ $item->model->title}}</a></td>
{{--                    <td style="vertical-align: middle">{{ $item->qty}}</td>--}}
                    <td style="vertical-align: middle">{{ $item->model->price }} €</td>
                    <td style="vertical-align: middle">
                        <form action="{{route('krepselis.destroy',$item->rowId)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger btn-sm">Išimti</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
            <h3 style="color: white"> Jūsų krepšelis tuščias! </h3>
    @endif

        <div class="cart-totals">
            <h3 style="padding-top: 15px">Suma: <a style="color: red">{{Cart::subtotal()}}</a> €</h3>
            @if(Cart::count() > 0)
            <a href="{{route('checkout.index')}}" class="buttonX">Pirkti</a>
            @endif
        </div>

    <section class="section">
    </section>
    </body>
@endsection
