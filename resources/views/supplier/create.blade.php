<div style="background-color: aqua">
    <h1>Insert Brand</h1>
    <form action="/brand/store" method="POST">
        @csrf
        <div>
            <p style="margin-bottom: 0;">Brand Name</p>
            <input type="text" name="name" placeholder="Input Brand Name" @error('terms') is invalid @enderror>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>