@extends('application')

@section('page-title')
Product
@endsection

@section('custom-css')
<style>
    #datatable {
        font-size: 12px;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content,
    #createProductModal div,
    #editProductModal div,
    #deleteProductModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Product Lists
        </p>
        <button type="button" class="btn btn-primary fs-16px" data-bs-toggle="modal"
            data-bs-target="#createProductModal">
            Create Product
        </button>
    </div>
    <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Vehicle</th>
                    <th>Supplier</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Selling Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td style="width: 5%;">{{$loop->iteration}}</td>
                    <td style="width: 20%;">{{$product->name}}</td>
                    <td style="width: 8%;">{{$product->category->name}}</td>
                    <td style="width: 8%;">{{$product->brand->name}}</td>
                    <td style="width: 8%;">{{$product->vehicle_type->name}}</td>
                    <td style="width: 15%;">{{$product->supplier->name}}-{{$product->supplier->company_name}}</td>
                    <td style="width: 5%;">{{number_format($product->quantity)}}</td>
                    <td style="width: 8%;">{{number_format($product->price)}}</td>
                    <td style="width: 8%;">{{number_format($product->selling_price)}}</td>
                    <td style="width: 10%;">
                        <button type="button" class="btn btn-info fs-16px edit" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#editProductModal" data-myName="{{$product->name}}"
                            data-myCategory="{{$product->category->id}}"
                            data-myCategoryName="{{$product->category->name}}" data-myBrand="{{$product->brand->id}}"
                            data-myVehicleType="{{$product->vehicle_type->id}}"
                            data-mySupplier="{{$product->supplier->id}}" data-myQuantity="{{$product->quantity}}"
                            data-myPrice="{{$product->price}}" data-mySellingPrice="{{$product->selling_price}}"
                            data-myId="{{$product->id}}">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </button>
                        <button type="button" class="btn btn-danger fs-16px edit" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-myId="{{$product->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Product Modal -->
<div class="modal" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="createProductModalLabel">Create Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('product.create')
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="editProductModalLabel">Edit Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('product.edit')
            </div>
        </div>
    </div>
</div>

<!-- Delete Product Modal -->
<div class="modal" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteProductModalLabel">Delete Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/product/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this product?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="product_id" id="product_id">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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

    $('#editProductModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var category = button.attr('data-myCategory');
        var brand = button.attr('data-myBrand');
        var vehicle_type = button.attr('data-myVehicleType');
        var supplier = button.attr('data-mySupplier');
        var quantity = button.attr('data-myQuantity');
        var price = button.attr('data-myPrice');
        var selling_price = button.attr('data-mySellingPrice');
        var name = button.attr('data-myName');
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #category').val(category);
        modal.find('.modal-body #vehicle_type').val(vehicle_type);
        modal.find('.modal-body #brand').val(brand);
        modal.find('.modal-body #supplier').val(supplier);
        modal.find('.modal-body #quantity').val(quantity);
        modal.find('.modal-body #price').val(price);
        modal.find('.modal-body #selling_price').val(selling_price);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #product_id').val(id);
    });

    $('#deleteProductModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #product_id').val(id);
    });

</script>
@endsection
