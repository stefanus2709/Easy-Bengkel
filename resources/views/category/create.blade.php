<div>
    <form action="/category/store" method="POST">
        @csrf
        <div>
            <label for="inputCategoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Input Category Name" @error('terms') is invalid @enderror>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>