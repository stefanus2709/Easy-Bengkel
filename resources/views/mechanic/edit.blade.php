@extends('application')

@section('page-title')
Update Supplier
@endsection

@section('custom-css')
<style>
    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
        padding: 4px 10px 10px 10px;
    }

    .dataTables_length,
    .dataTables_filter {
        padding: 10px 10px 4px 10px;
    }

    .active>.page-link,
    .page-link.active,
    .btn-primary {
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link {
        color: #293A80;
    }

    .left-form,
    .right-form {
        padding: 0 5px 0 0;
    }

    .main-content,
    #deleteSupplierModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Update Supplier {{$mechanic->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3 mb-3">
        <form action="/mechanic/update/{{$mechanic->id}}" method="POST" id="editForm">
            @csrf
            @method('PATCH')
            <input type="hidden" name="mechanic_id" id="mechanic_id">
            <div>
                <label for="inputSupplierName" class="form-label">Supplier Name</label>
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Supplier Name" value="{{$mechanic->name}}"
                    @error('name') is invalid @enderror>
            </div>
            <div>
                <label for="inputCompanyName" class="form-label">Salary</label>
                <input type="text" class="form-control mb-3" value="{{$mechanic->salary}}" disabled>
            </div>
            <div>
                <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control mb-3" id="phone_number" name="phone_number" value="{{$mechanic->phone_number}}"
                    placeholder="Input Phone Number" @error('phone_number') is invalid @enderror>
            </div>
            <div>
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control mb-3" id="address" name="address" placeholder="Input Address" value="{{$mechanic->address}}"
                    @error('address') is invalid @enderror>
            </div>
            <div class="text-end">
                <a href="/supplier" class="btn btn-secondary">Back</a>
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
