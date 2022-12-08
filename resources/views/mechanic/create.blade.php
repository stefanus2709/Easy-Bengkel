<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Mechanic
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form class="row g-3 needs-validation" action="/mechanic/store" method="POST" novalidate>
        @csrf
        <div>
            <label for="inputMechanicName" class="form-label">Mechanic Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input Mechanic Name" required>
            <div class="invalid-feedback">
                Please input mechanic name
            </div>
        </div>
        <div>
            <label for="inputPhoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Input Phone Number" required>
            <div class="invalid-feedback">
                Please input mechanic phone number
            </div>
        </div>
        <div>
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Input Address" required>
            <div class="invalid-feedback">
                Please input mechanic address
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
