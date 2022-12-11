@extends('application')

@section('page-title')
Update Brand
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Update Brand
        </p>
    </div>
    <div class="bg-white rounded p-3 mb-3">
        <form class="row g-3 needs-validation" action="/brand/update/{{$brand->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="">
                <label for="inputBrandName" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$brand->name}}" required>
                <div class="invalid-feedback">
                    Please input brand name
                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/brand" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
