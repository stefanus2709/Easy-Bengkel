@extends('application')

@section('page-title')
Update Brand
@endsection

@section('custom-css')
<style>
    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content,
    #deleteBrandModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Update Brand
        </p>
    </div>
    <div>
        <form action="/brand/update/{{$brand->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputBrandName" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$brand->name}}">
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

@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection
