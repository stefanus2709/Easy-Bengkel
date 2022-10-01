<div>
    <form action="/brand/store" method="POST">
        @csrf
        <div>
            <label for="inputBrandName" class="form-label">Brand Name</label>
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Input Brand Name" @error('terms') is invalid @enderror>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>