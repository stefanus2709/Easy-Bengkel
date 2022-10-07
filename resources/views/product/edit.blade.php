@extends('application')

@section('page-title')
Edit Product
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
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Edit Product {{$product->name}}
        </p>
    </div>
    <form action="/product/update/" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
        <div class="d-flex justify-content-around">
            <div class="container-md left-form">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Input Product Name" value="{{$product->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputQuantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        placeholder="Input Quantity" value="{{$product->quantity}}">
                    @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price"
                        placeholder="Input Price" value="{{$product->price}}">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputSellingPrice" class="form-label">Selling Price</label>
                    <input type="number" class="form-control" id="selling_price" name="selling_price"
                        placeholder="Input Selling Price" value="{{$product->selling_price}}">
                    @error('selling_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="container-md right-form">
                <div class="mb-3">
                    <label for="select" class="form-label">Category</label>
                    <select id="category" class="selectpicker form-control" data-live-search="true"
                        name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="select" class="form-label">Vehicle Type</label>
                    <select id="vehicle_type" class="selectpicker form-control" data-live-search="true"
                        name="vehicle_type_id">
                        @foreach ($vehicle_types as $vehicle_type)
                        <option value="{{$vehicle_type->id}}">{{$vehicle_type->name}}</option>
                        @endforeach
                    </select>
                    @error('vehicle_type_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="select" class="form-label">Brand</label>
                    <select id="brand" class="selectpicker form-control" data-live-search="true"
                        name="brand_id">
                        @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="select" class="form-label">Supplier</label>
                    <select id="supplier" class="selectpicker form-control" data-live-search="true"
                        name="supplier_id" value="{{$product->supplier_id}}">
                        @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}-{{$supplier->company_name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('supplier_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="text-end">
                    <a href="/product" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            History Product Stock
        </p>
    </div>
    <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Date</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_details as $detail)
                <tr>
                    <td style="width: 5%;">{{$loop->iteration}}</td>
                    <td style="width: 20%;">{{$detail->purchaseIn->supplier->name}} - {{$detail->purchaseIn->supplier->company_name}}</td>
                    <td style="width: 8%;">{{$detail->purchaseIn->date}}</td>
                    <td style="width: 8%;">{{$detail->quantity}}</td>
                    <td style="width: 8%;">{{$detail->price}}</td>
                    <td style="width: 5%;">
                        <a href="/po_in/edit/{{$detail->purchaseIn->id}}" class="btn btn-success fs-16px"><i class="icofont-search-1"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
        $('select[name=category_id]').selectpicker('val', '{{$product->category_id}}');
        $('select[name=vehicle_type_id]').selectpicker('val', '{{$product->vehicle_type_id}}');
        $('select[name=brand_id]').selectpicker('val', '{{$product->brand_id}}');
        $('select[name=supplier_id]').selectpicker('val', '{{$product->supplier_id}}');
    });

</script>
@endsection
