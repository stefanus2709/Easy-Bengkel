<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Supplier
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form class="row g-3 needs-validation" action="/supplier/store" method="POST" novalidate>
        @csrf
        <div class="col-md-6">
            <label for="inputSupplierName" class="form-label">Supplier Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input Supplier Name"
                required>
            <div class="invalid-feedback">
                Please input supplier name
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputCompanyName" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name"
                placeholder="Input Company Name" required>
            <div class="invalid-feedback">
                Please input company name
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPhoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number"
                placeholder="Input Phone Number" required>
            <div class="invalid-feedback">
                Please input supplier phone number
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Input Address"
                required>
            <div class="invalid-feedback">
                Please input supplier address
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
