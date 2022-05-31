@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/admin/categories/'.$categories->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Categories</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $categories->id }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $categories->title }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
