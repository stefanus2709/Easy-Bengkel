<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Product
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form class="row g-3 needs-validation" action="/product/store" method="POST" novalidate>
        @csrf
        <div class="col-md-3">
            @if (!blank($categories))
            <label for="select" class="form-label">Select Category</label>
            <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                data-max-options="1" name="category_id" required>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @else
            <fieldset disabled>
                <label for="disabledSelect" class="form-label">Select Category</label>
                <select id="disabledSelect" class="form-control" required>
                    <option>No Categories Data</option>
                </select>
            </fieldset>
            @endif
        </div>
        <div class="col-md-3">
            @if (!blank($vehicle_types))
            <label for="select" class="form-label">Select Vehicle Type</label>
            <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                data-max-options="1" name="vehicle_type_id" required>
                @foreach ($vehicle_types as $vehicle_type)
                <option value="{{$vehicle_type->id}}">{{$vehicle_type->name}}</option>
                @endforeach
            </select>
            @else
            <fieldset disabled>
                <label for="disabledSelect" class="form-label">Select Vehicle Type</label>
                <select id="disabledSelect" class="form-select" required>
                    <option>No Vehicle Types Data</option>
                </select>
            </fieldset>
            @endif
        </div>
        <div class="col-md-3">
            @if (!blank($brands))
            <label for="select" class="form-label">Select Brand</label>
            <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                data-max-options="1" name="brand_id" required>
                @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            @else
            <fieldset disabled>
                <label for="disabledSelect" class="form-label">Select Brand</label>
                <select id="disabledSelect" class="form-select" required>
                    <option>No Brands Data</option>
                </select>
            </fieldset>
            @endif
        </div>
        <div class="col-md-3">
            @if (!blank($suppliers))
            <label for="select" class="form-label">Select Supplier</label>
            <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                data-max-options="1" name="supplier_id" required>
                @foreach ($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}-{{$supplier->company_name}}</option>
                @endforeach
            </select>
            @else
            <fieldset disabled>
                <label for="disabledSelect" class="form-label">Select Supplier</label>
                <select id="disabledSelect" class="form-select" required>
                    <option>No Suppliers Data</option>
                </select>
            </fieldset>
            @endif
        </div>
        <div class="col-md-3">
            <label for="inputProductName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input Product Name" required>
            <div class="invalid-feedback">
                Please input product name
            </div>
        </div>
        <div class="col-md-3">
            <label for="inputProductQuantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity"
                placeholder="Input Quantity" required>
            <div class="invalid-feedback">
                Please input product quantity
            </div>
        </div>
        <div class="col-md-3">
            <label for="inputProductPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Input Price" required>
            <div class="invalid-feedback">
                Please input product price
            </div>
        </div>
        <div class="col-md-3">
            <label for="inputProductSellingPrice" class="form-label">Selling Price</label>
            <input type="number" class="form-control" id="selling_price" name="selling_price"
                placeholder="Input Selling Price" required>
            <div class="invalid-feedback">
                Please input product selling price
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
