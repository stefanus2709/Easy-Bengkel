<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Product
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form action="/product/store" method="POST">
        @csrf
        <div class="d-flex justify-content-around">
            <div class="container-md left-form">
                <div class="mb-3">
                    @if (!blank($categories))
                    <label for="select" class="form-label">Select Category</label>
                    <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                        data-max-options="1" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Select Category</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Categories Data</option>
                        </select>
                    </fieldset>
                    @endif
                    @error('category_id')
                    <span class="text-danger">The category field is required.</span>
                    @enderror
                </div>
                <div class="mb-3">
                    @if (!blank($vehicle_types))
                    <label for="select" class="form-label">Select Vehicle Type</label>
                    <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                        data-max-options="1" name="vehicle_type_id">
                        @foreach ($vehicle_types as $vehicle_type)
                        <option value="{{$vehicle_type->id}}">{{$vehicle_type->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Select Vehicle Type</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Vehicle Types Data</option>
                        </select>
                    </fieldset>
                    @endif
                    @error('vehicle_type_id')
                    <span class="text-danger">The vehicle type field is required.</span>
                    @enderror
                </div>
                <div class="mb-3">
                    @if (!blank($brands))
                    <label for="select" class="form-label">Select Brand</label>
                    <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                        data-max-options="1" name="brand_id">
                        @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Select Brand</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Brands Data</option>
                        </select>
                    </fieldset>
                    @endif
                    @error('brand_id')
                    <span class="text-danger">The brand field is required.</span>
                    @enderror
                </div>
                <div class="mb-3">
                    @if (!blank($suppliers))
                    <label for="select" class="form-label">Select Supplier</label>
                    <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                        data-max-options="1" name="supplier_id">
                        @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}-{{$supplier->company_name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Select Supplier</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Suppliers Data</option>
                        </select>
                    </fieldset>
                    @endif
                    @error('supplier_id')
                    <span class="text-danger">The supplier field is required.</span>
                    @enderror
                </div>
            </div>
            <div class="container-md right-form p-0">
                <div class="mb-3">
                    <label for="inputProductName" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        placeholder="Input Quantity">
                    @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputProductName" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Input Price">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputProductName" class="form-label">Selling Price</label>
                    <input type="number" class="form-control" id="selling_price" name="selling_price"
                        placeholder="Input Selling Price">
                    @error('selling_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputProductName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Input Product Name">
                    @error('name')
                    <span class="text-danger">The product name field is required.</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
