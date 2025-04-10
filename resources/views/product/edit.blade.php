@extends('application')

@section('page-title')
Edit Product
@endsection
@section('product','active text-white')

@section('content')
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Edit Product {{$product->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3">
        <form class="row g-3 needs-validation" action="/product/update/{{$product->id}}" method="POST" novalidate>
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
                    placeholder="Input Quantity" value="{{number_format($product->quantity, 0, ',', '.')}}">
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
<script type="text/javascript">
    $(document).ready(function () {
        var stockTable = $('#stockTable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
        var soldTable = $('#soldTable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
        $('select[name=category_id]').selectpicker('val', '{{$product->category_id}}');
        $('select[name=vehicle_type_id]').selectpicker('val', '{{$product->vehicle_type_id}}');
        $('select[name=brand_id]').selectpicker('val', '{{$product->brand_id}}');
        $('select[name=supplier_id]').selectpicker('val', '{{$product->supplier_id}}');
    });
</script>
@endsection
