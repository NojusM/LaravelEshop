@extends('layouts.admin')

@section('title', 'Types')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($types))
                    Edit Type
                @else
                    Add Type
                @endif
            </h6>
        </div>
        <div class="card-body">

            @if(isset($types))
                {!! Form::model($types, ['url' => ['admin/types', $types->id], 'method' => 'patch']) !!}
            @else
                {!! Form::open(['url' => 'admin/types']) !!}
            @endif

            <div class="form-group col-sm-6">
                {!! Form::label('title', 'Title: ') !!}
                {!! Form::text('title', null, ['class' => 'form-control'.($errors->has('title') ? ' is-invalid' : '')]) !!}
                @foreach ($errors->get('title') as $message)
                    <div class="invalid-feedback">{{ $message }}</div>
                @endforeach
            </div>
            <div class="form-group col-sm-3">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
