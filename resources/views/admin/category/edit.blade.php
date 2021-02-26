@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('category.index') }}" style="float: right" class="btn btn-primary">View Category List</a>
        <strong>Update Category</strong>
    </div>

    <div class="card-body">
        <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
            @csrf
            @method('PUT')
            @include('admin.category.form')
            <input type="submit" class="btn btn-success" value="Update Now">
        </form>
    </div>
</div>
@endsection
