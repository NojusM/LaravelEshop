@extends('layouts.admin')

@section('title', 'Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/admin/products/'.$products->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $products->id }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $products->title }}</td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td>{{ $products->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $products->price }} €</td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $products->category->title }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{ $products->type->title }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $products->description }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td><img src="{{ url('uploads/animeimg', $products->animeimg) }}"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
