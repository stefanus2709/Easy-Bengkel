@extends('application')

@section('page-title')
Update Vehicle Type
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
    #deleteVehicleTypeModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Update Vehicle Type
        </p>
    </div>
    <div>
        <form action="/vehicle_type/update/{{$vehicle_type->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputVehicleTypeName" class="form-label">Vehicle Type Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$vehicle_type->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/vehicle_type" class="btn btn-secondary">Back</a>
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
