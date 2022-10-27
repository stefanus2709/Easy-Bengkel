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
            Update Supplier {{$supplier->name}} - {{$supplier->company_name}}
        </p>
    </div>
    <div class="bg-white rounded p-3 mb-3">
        <form action="/supplier/update/{{$supplier->id}}" method="POST" id="editForm">
            @csrf
            @method('PATCH')
            <input type="hidden" name="supplier_id" id="supplier_id">
            <div>
                <label for="inputSupplierName" class="form-label">Supplier Name</label>
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Supplier Name" value="{{$supplier->name}}"
                    @error('name') is invalid @enderror>
            </div>
            <div>
                <label for="inputCompanyName" class="form-label">Company Name</label>
                <input type="text" class="form-control mb-3" id="company_name" name="company_name" value="{{$supplier->company_name}}"
                    placeholder="Input Company Name" @error('company_name') is invalid @enderror>
            </div>
            <div>
                <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control mb-3" id="phone_number" name="phone_number" value="{{$supplier->phone_number}}"
                    placeholder="Input Phone Number" @error('phone_number') is invalid @enderror>
            </div>
            <div>
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control mb-3" id="address" name="address" placeholder="Input Address" value="{{$supplier->address}}"
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
