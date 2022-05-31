@extends('layouts.admin')

@section('title', 'Types')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/admin/types/'.$types->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Types</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $types->id }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $types->title }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
