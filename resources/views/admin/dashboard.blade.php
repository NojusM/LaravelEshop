@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="table text-md-center">
        <table class="table table-bordered table-striped text-bold ">
            <thead>
            <tr>
                <th>Vartotojai</th>
                <th>Prekės</th>
                <th>Kategorijos</th>
                <th>Tipai</th>
            </tr>
            </thead>
            <tbody class="text-green font-size-big">
            <tr>
                <td>{{ DB::table('users')->count() }}</td>
                <td>{{ DB::table('products')->count() }}</td>
                <td>{{ DB::table('categories')->count() }}</td>
                <td>{{ DB::table('types')->count() }}</td>
            </tr>
            </tbody>
        </table>

        <div class="row-cols-1" style="padding: 50px">
            <h1>Populiariausios prekės</h1>
        </div>
        <div class="row">
            @foreach($datas as $item)
                <div class="column">
                    <a href="{{route('figureles.show', $item->title)}}">
                        <img src="{{asset('uploads/animeimg/'.$item->animeimg)}}" alt="No image" width="240" height="300"/>
                        <div class="name">
                            {{$item['title']}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
{{--        <div class="row">--}}

{{--                <div class="column">--}}
{{--                    <a href="{{route('figureles.show', $responsez->title)}}">--}}
{{--                        <img src="{{asset('uploads/animeimg/'.$responsez->animeimg)}}" alt="No image" width="240" height="300"/>--}}
{{--                        <div class="name">--}}
{{--                            {{$responsez['title']}}--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--        </div>--}}

    </div>
@endsection
