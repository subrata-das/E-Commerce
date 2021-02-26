@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('category.index') }}" style="float: right" class="btn btn-primary">View Category List</a>
        <strong>Create Category</strong>
    </div>

    <div class="card-body">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            @include('admin.category.form');
            <input type="submit" class="btn btn-success" value="Create Now">
        </form>
    </div>
</div>
@endsection
