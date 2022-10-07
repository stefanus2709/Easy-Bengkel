@extends('application')

@section('page-title')
Create Vehicle Type
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
            Create Vehicle Type
        </p>
    </div>
    <div>
        <form action="/vehicle_type/store" method="POST">
            @csrf
            <div>
                <label for="inputVehicleTypeName" class="form-label">Vehicle Type Name</label>
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Vehicle Type Name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/vehicle_type" class="btn btn-secondary">Back</a>
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
