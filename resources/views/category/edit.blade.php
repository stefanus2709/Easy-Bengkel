<div style="background-color: aqua">
    <h1>Edit Category</h1>
    <form action="/category/update/{{$category->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <p style="margin-bottom: 0;">Category Name</p>
            <input type="text" name="name" placeholder="Input Category Name" value="{{$category->name}}" @error('terms') is invalid @enderror>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>