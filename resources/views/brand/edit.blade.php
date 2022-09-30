<div style="background-color: aqua">
    <h1>Edit Brand</h1>
    <form action="/brand/update/{{$brand->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <p style="margin-bottom: 0;">Brand Name</p>
            <input type="text" name="name" placeholder="Input Brand Name" value="{{$brand->name}}" @error('terms') is invalid @enderror>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>