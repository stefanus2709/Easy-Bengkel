<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Brand
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form class="row g-3 needs-validation" action="/brand/store" method="POST" novalidate>
        @csrf
        <div class="bg-white rounded">
            <label for="inputBrandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input Brand Name" required>
            <div class="invalid-feedback">
                Please input brand name
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
