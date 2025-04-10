<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Category
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form class="needs-validation" action="/category/store" method="POST" novalidate>
        @csrf
        <div class="mb-3">
            <label for="inputCategoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input Category Name" required>
            <div class="invalid-feedback">
                Please input category name
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
