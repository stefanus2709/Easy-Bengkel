@extends('application')

@section('page-title')
Edit Category
@endsection
@section('category','active text-white')

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Edit Category
        </p>
    </div>
    <div class="bg-white rounded p-3 mb-3">
        <form class="needs-validation" action="/category/update/{{$category->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputCategoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" required>
                <div class="invalid-feedback">
                    Please input category name
                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/category" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
