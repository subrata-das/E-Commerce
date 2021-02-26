@if(Session::has('message'))
<p class="alert {{ Session::get('alert') }}">{{ Session::get('message') }}</p>
@endif
<div class="row">
    <div class="col-md-12">
        Parent Category
        <select name="parent_id" id="" class="form-control">
            <option value="">N/A</option>
            @foreach ($parent_category as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option> 
            @endforeach
        </select>
    </div>
    <div class="col-md-12">
        Category Name
        <input type="text" name="name" id=""  class="form-control" value="{{ old('name',optional($category ?? null)->name) }}">
    </div>
    <div class="col-md-12">
        Category Description
        <textarea name="desc" id="" class="form-control" cols="30" rows="6">{{ old('desc',optional($category ?? null)->desc) }}</textarea>
    </div>
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    </div>
</div>