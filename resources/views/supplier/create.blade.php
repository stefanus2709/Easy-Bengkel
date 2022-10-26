<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Supplier
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form action="/supplier/store" method="POST">
        @csrf
        <div class="d-flex justify-content-around">
            <div class="container-md left-form">
                <div>
                    <label for="inputSupplierName" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Input Supplier Name" @error('name') is invalid @enderror>
                </div>
                <div>
                    <label for="inputCompanyName" class="form-label">Company Name</label>
                    <input type="text" class="form-control mb-3" id="company_name" name="company_name" placeholder="Input Company Name" @error('company_name') is invalid @enderror>
                </div>
            </div>
            <div class="container-md right-form">
                <div>
                    <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control mb-3" id="phone_number" name="phone_number" placeholder="Input Phone Number" @error('phone_number') is invalid @enderror>
                </div>
                <div>
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control mb-3" id="address" name="address" placeholder="Input Address" @error('address') is invalid @enderror>
                </div>
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
