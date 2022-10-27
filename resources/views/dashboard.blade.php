@extends('application')

@section('page-title')
Dashboard
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
    #createSupplierModal div,
    #editSupplierModal div,
    #deleteSupplierModal div {
        font-family: 'Poppins';
    }

    .active > .page-link, .page-link.active, .btn-primary{
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link{
        color: #293A80;
    }

    .container-summary-box {
        margin-right: 10px;
        align-items: center;
        border-radius: 10px;
    }

    .container-summary-box i {
        font-size: 33px;
        color: white;
    }

    .container-summary-text p {
        font-size: 13px;
        color: white;
    }

    .container-summary-text p.value {
        font-size: 20px;
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Dashboard
        </p>
    </div>
    <div class="mb-2 align-middle">
        <p class="fs-16px mb-0 pb-0 fw-bold">
            Summary
        </p>
    </div>
    <div class="bg-white rounded p-3 mb-3">
        <div class="d-flex justify-content-between mb-3">
            <a href="/product"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-success border border-success text-decoration-none">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Total All Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        {{count($products)}}
                    </p>
                </div>
            </a>
            <a href="/product/low"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-danger border border-danger text-decoration-none">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Low Stock Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        {{count($low_products)}}
                    </p>
                </div>
            </a>
            <a href="/po_in/this_month"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-warning border border-warning text-decoration-none">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Total Purchase ({{ date('F')}})
                    </p>
                    <p class="mb-0 pb-0 value">
                        Rp {{number_format($total_purchase, 0, ',', '.')}}
                    </p>
                </div>
            </a>
            <div
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-primary border border-primary">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Least Sold Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        123
                    </p>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="/product"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-success border border-success text-decoration-none">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Total All Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        {{count($products)}}
                    </p>
                </div>
            </a>
            <a href="/product/low"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-danger border border-danger text-decoration-none">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Low Stock Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        {{count($low_products)}}
                    </p>
                </div>
            </a>
            <a href="/po_in/this_month"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-warning border border-warning text-decoration-none">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Total Purchase ({{ date('F')}})
                    </p>
                    <p class="mb-0 pb-0 value">
                        Rp {{number_format($total_purchase, 0, ',', '.')}}
                    </p>
                </div>
            </a>
            <div
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-primary border border-primary">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Least Sold Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        123
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mb-3 align-middle">
        <p class="fs-16px mb-0 pb-0 fw-bold">
            5 Best Selling Products
        </p>
    </div>
    {{-- <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td style="width: 10%;">{{$loop->iteration}}</td>
    <td style="width: 15%;">{{$supplier->name}}</td>
    <td style="width: 25%;">{{$supplier->company_name}}</td>
    <td style="width: 15%;">{{$supplier->phone_number}}</td>
    <td style="width: 25%;">{{$supplier->address}}</td>
    <td style="width: 10%;">
        <button type="button" class="btn btn-info fs-16px edit" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#editSupplierModal" data-myName="{{$supplier->name}}"
            data-myCompanyName="{{$supplier->company_name}}" data-myPhoneNumber="{{$supplier->phone_number}}"
            data-myAddress="{{$supplier->address}}" data-myId="{{$supplier->id}}">
            <i class="icofont-pencil-alt-2 text-light"></i>
        </button>
        <button type="button" class="btn btn-danger fs-16px edit" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#deleteSupplierModal" data-myId="{{$supplier->id}}">
            <i class="icofont-trash text-light"></i>
        </button>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div> --}}
</div>

{{-- <!-- Create Supplier Modal -->
<div class="modal" id="createSupplierModal" tabindex="-1" aria-labelledby="createSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="createSupplierModalLabel">Create Supplier</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('supplier.create')
            </div>
        </div>
    </div>
</div>

<!-- Edit Supplier Modal -->
<div class="modal" id="editSupplierModal" tabindex="-1" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="editSupplierModalLabel">Edit Supplier</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('supplier.edit')
            </div>
        </div>
    </div>
</div>

<!-- Delete Supplier Modal -->
<div class="modal" id="deleteSupplierModal" tabindex="-1" aria-labelledby="deleteSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteSupplierModalLabel">Delete Supplier</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/supplier/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this supplier?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="supplier_id" id="supplier_id">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
    });

    // $('#editSupplierModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget);
    //     var name = button.attr('data-myName');
    //     var company_name = button.attr('data-myCompanyName');
    //     var phone_number = button.attr('data-myPhoneNumber');
    //     var address = button.attr('data-myAddress');
    //     var id = button.attr('data-myId');

    //     var modal = $(this)
    //     modal.find('.modal-body #name').val(name);
    //     modal.find('.modal-body #company_name').val(company_name);
    //     modal.find('.modal-body #phone_number').val(phone_number);
    //     modal.find('.modal-body #address').val(address);
    //     modal.find('.modal-body #supplier_id').val(id);
    // });

    // $('#deleteSupplierModal').on('show.bs.modal', function (event) {
    //     var button = $(event.relatedTarget);
    //     var id = button.attr('data-myId');

    //     var modal = $(this)
    //     modal.find('.modal-body #supplier_id').val(id);
    // });

</script>
@endsection
