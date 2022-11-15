<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Purchase Order
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form action="/po_in/store" method="POST">
        @csrf
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
        <div class="mb-3">
            <label for="inputPurchaseInDate" class="form-label">Purchase Date</label>
            <input type="date" class="form-control" id="date" name="date"
                placeholder="Input Purchase Date">
            @error('date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
