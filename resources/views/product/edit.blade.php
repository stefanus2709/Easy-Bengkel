<div>
    <form action="/product/update" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" name="product_id" id="product_id">
        <div class="d-flex justify-content-around">
            <div class="container-md left-form">
                <div class="mb-3">
                    @if (!blank($categories))
                    <label for="select" class="form-label">Category</label>
                    <select id="category" class="form-select" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Category</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Categories Data</option>
                        </select>
                    </fieldset>
                    @endif
                </div>
                <div class="mb-3">
                    @if (!blank($vehicle_types))
                    <label for="select" class="form-label">Vehicle Type</label>
                    <select id="vehicle_type" class="form-select" name="vehicle_type_id">
                        @foreach ($vehicle_types as $vehicle_type)
                        <option value="{{$vehicle_type->id}}">{{$vehicle_type->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Vehicle Type</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Vehicle Types Data</option>
                        </select>
                    </fieldset>
                    @endif
                </div>
                <div class="mb-3">
                    @if (!blank($brands))
                    <label for="select" class="form-label">Brand</label>
                    <select id="brand" class="form-select" name="brand_id">
                        @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Brand</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Brands Data</option>
                        </select>
                    </fieldset>
                    @endif
                </div>
                <div class="mb-3">
                    @if (!blank($suppliers))
                    <label for="select" class="form-label">Supplier</label>
                    <select id="supplier" class="form-select" name="supplier_id">
                        @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}-{{$supplier->company_name}}</option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Supplier</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Suppliers Data</option>
                        </select>
                    </fieldset>
                    @endif
                </div>
            </div>
            <div class="container-md right-form">
                <div>
                    <label for="inputProductName" class="form-label">Quantity</label>
                    <input type="number" class="form-control mb-3" id="quantity" name="quantity" placeholder="Input Quantity"
                        @error('name') is invalid @enderror>
                </div>
                <div>
                    <label for="inputProductName" class="form-label">Price</label>
                    <input type="number" class="form-control mb-3" id="price" name="price" placeholder="Input Price"
                        @error('name') is invalid @enderror>
                </div>
                <div>
                    <label for="inputProductName" class="form-label">Selling Price</label>
                    <input type="number" class="form-control mb-3" id="selling_price" name="selling_price"
                        placeholder="Input Selling Price" @error('name') is invalid @enderror>
                </div>
                <div>
                    <label for="inputProductName" class="form-label">Product Name</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Input Product Name"
                        @error('name') is invalid @enderror>
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
