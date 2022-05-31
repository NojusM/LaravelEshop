@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($products))
                    Edit Product
                @else
                    Add Product
                @endif
            </h6>
        </div>
        <div class="card-body">
            @if(isset($products))
                {!! Form::model($products, ['url' => ['admin/products', $products->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
            @else
                {!! Form::open(['url' => 'admin/products', 'enctype'=>'multipart/form-data']) !!}
            @endif

            <div class="form-group col-sm-6">
                {!! Form::label('title', 'Title: ') !!}
                {!! Form::text('title', null, ['class' => 'form-control'.($errors->has('title') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
            </div>
                <div class="form-group col-sm-6">
                {!! Form::label('quantity', 'Quantity: ') !!}
                {!! Form::text('quantity', null, ['class' => 'form-control'.($errors->has('quantity') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
            </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('price', 'Price: ') !!}
                    {!! Form::text('price', null, ['class' => 'form-control'.($errors->has('price') ? ' is-invalid' : '')]) !!}
                    {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('category_id', 'Category: ') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control'.($errors->has('category_id') ? ' is-invalid' : '')]) !!}
                    @foreach ($errors->get('title') as $message)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endforeach
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('type_id', 'Type: ') !!}
                    {!! Form::select('type_id', $types, null, ['class' => 'form-control'.($errors->has('type_id') ? ' is-invalid' : '')]) !!}
                    {!! $errors->first('type_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('description', 'Description: ') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : '')]) !!}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            <div class="form-group col-sm-6">
                <div class="custom-file">
                    {!! Form::label('animeimg', 'Upload product image', ['class' => 'custom-file-label'.($errors->has('animeimg') ? ' is-invalid' : '')]) !!}
                    {!! Form::file('animeimg', ['class' => 'custom-file-input']) !!}
                    {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}

                </div>
                @if(isset($products->animeimg))
                    <img src="{{ url('uploads/vapeimage', $products->animeimg) }}" height="100" class="mt-2">
                @endif
                {!! $errors->first('animeimg', '<div class="invalid-feedback">:message</div>') !!}

            </div>
            <div class="form-group col-sm-3">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
