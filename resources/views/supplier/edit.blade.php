@extends('application')

@section('page-title')
Update Supplier
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
        <form class="row g-3 needs-validation" action="/supplier/update/{{$supplier->id}}" method="POST" id="editForm" novalidate>
            @csrf
            @method('PATCH')
            <input type="hidden" name="supplier_id" id="supplier_id">
            <div class="col-md-6">
                <label for="inputSupplierName" class="form-label">Supplier Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Input Supplier Name" value="{{$supplier->name}}"
                    required>
                <div class="invalid-feedback">
                    Please input supplier name
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputCompanyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="{{$supplier->company_name}}"
                    placeholder="Input Company Name" required>
                <div class="invalid-feedback">
                    Please input company name
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{$supplier->phone_number}}"
                    placeholder="Input Phone Number" required>
                <div class="invalid-feedback">
                    Please input supplier phone number
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Input Address" value="{{$supplier->address}}"
                    required>
            </div>
            <div class="text-end">
                <a href="/supplier" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
