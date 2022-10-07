<div>

</div>

@extends('application')

@section('page-title')
Create Category
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
    #deleteCategoryModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Create Category
        </p>
    </div>
    <div>
        <form action="/category/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="inputCategoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Input Category Name" @error('terms') is invalid @enderror>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/category" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection
