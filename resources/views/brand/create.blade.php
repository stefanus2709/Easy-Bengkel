<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Brand
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form action="/brand/store" method="POST">
        @csrf
        <div class="bg-white rounded mb-3">
            <label for="inputBrandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Input Brand Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
