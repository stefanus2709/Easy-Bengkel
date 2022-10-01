<div>
    <form action="/category/update" method="POST" id="editForm">
        @csrf
        @method('PATCH')
        <div>
            <label for="inputCategoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Category Name" @error('name') is invalid @enderror>
            <input type="hidden" name="category_id" id="category_id">
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>