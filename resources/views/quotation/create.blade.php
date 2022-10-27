<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Quotation
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form action="/quotation/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inputCustomerName" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                placeholder="Input Customer Name">
            @error('customer_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Input Date">
            @error('date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="text-end">
            <a href="/quotation" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
