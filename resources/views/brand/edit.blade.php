<div>
    <form action="/brand/update" method="POST" id="editForm">
        @csrf
        @method('PATCH')
        <div>
            <label for="inputBrandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Brand Name" @error('name') is invalid @enderror>
            <input type="hidden" name="brand_id" id="brand_id">
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>