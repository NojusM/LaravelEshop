@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($categories))
                    Edit Category
                @else
                    Add Category
                @endif
            </h6>
        </div>
        <div class="card-body">

            @if(isset($categories))
                {!! Form::model($categories, ['url' => ['admin/categories', $categories->id], 'method' => 'patch']) !!}
            @else
                {!! Form::open(['url' => 'admin/categories']) !!}
            @endif

            <div class="form-group col-sm-6">
                {!! Form::label('title', 'Title: ') !!}
                {!! Form::text('title', null, ['class' => 'form-control'.($errors->has('title') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-sm-3">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
