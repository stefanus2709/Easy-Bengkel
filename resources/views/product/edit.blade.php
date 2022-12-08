@extends('application')

@section('page-title')
Edit Product
@endsection

@section('custom-css')
<style>
    #datatable {
        font-size: 14px;
    }

    .dataTables_info {
        display: none;
    }

    .active>.page-link,
    .page-link.active,
    .btn-primary {
        background-color: #293A80;
        border-color: #293A80;
    }

    .left-form {
        padding: 0 5px 0 0;
    }

    .page-link {
        color: #293A80;
    }

    .dataTables_length,
    .dataTables_filter {
        padding: 10px 10px 4px 10px;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
        padding: 4px 10px 10px 10px;
    }

    .main-content,
    #deleteProductModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Edit Product {{$product->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3">
        <form class="row g-3 needs-validation" action="/product/update/" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
            <div class="col-md-3">
                <label for="select" class="form-label">Category</label>
                <select id="category" class="selectpicker form-control" data-live-search="true"
                    name="category_id" required>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="select" class="form-label">Vehicle Type</label>
                <select id="vehicle_type" class="selectpicker form-control" data-live-search="true"
                    name="vehicle_type_id" required>
                    @foreach ($vehicle_types as $vehicle_type)
                    <option value="{{$vehicle_type->id}}">{{$vehicle_type->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="select" class="form-label">Brand</label>
                <select id="brand" class="selectpicker form-control" data-live-search="true"
                    name="brand_id" required>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="select" class="form-label">Supplier</label>
                <select id="supplier" class="selectpicker form-control" data-live-search="true"
                    name="supplier_id" value="{{$product->supplier_id}}" required>
                    @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}-{{$supplier->company_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="inputName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    placeholder="Input Product Name" value="{{$product->name}}" required>
                <div class="invalid-feedback">
                    Please input product name
                </div>
            </div>
            <div class="col-md-3">
                <label for="inputQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity"
                    placeholder="Input Quantity" value="{{number_format($product->quantity, 0, ',', '.')}}" disabled>
            </div>
            <div class="col-md-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price"
                    placeholder="Input Price" value="{{$product->price}}" required>
                <div class="invalid-feedback">
                    Please input product price
                </div>
            </div>
            <div class="col-md-3">
                <label for="inputSellingPrice" class="form-label">Selling Price</label>
                <input type="number" class="form-control" id="selling_price" name="selling_price"
                    placeholder="Input Selling Price" value="{{$product->selling_price}}" required>
                <div class="invalid-feedback">
                    Please input product selling price
                </div>
            </div>

            <div class="text-end">
                <a href="/product" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<div class="px-4 main-content">
    @include('product.stock-history')
</div>
<div class="px-4 main-content">
    @include('product.sold-history')
</div>
@endsection
@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var stockTable = $('#stockTable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
        var soldTable = $('#soldTable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
        $('select[name=category_id]').selectpicker('val', '{{$product->category_id}}');
        $('select[name=vehicle_type_id]').selectpicker('val', '{{$product->vehicle_type_id}}');
        $('select[name=brand_id]').selectpicker('val', '{{$product->brand_id}}');
        $('select[name=supplier_id]').selectpicker('val', '{{$product->supplier_id}}');
    });

    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection
