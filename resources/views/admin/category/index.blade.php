@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('category.create') }}" style="float: right" class="btn btn-primary">Create New</a>
        <strong>Category List</strong>
    </div>

    <div class="card-body">
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="table-info">
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        {{-- <th>Parent Category</th> --}}
                        <th>Created at</th>
                        <th>updated at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->desc }}</td>
                {{-- <td>{{ $item->id }}</td> --}}
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="{{ route('category.edit',['id'=>$item->id]) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('category.destroy',['id'=>$item->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No data Found</td>
            </tr>
            @endforelse
                </tbody>
            </table>
        </div>
        
        
    </div>
</div>
@endsection
