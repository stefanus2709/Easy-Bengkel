<div>
    <form action="/vehicle_type/store" method="POST">
        @csrf
        <div>
            <label for="inputVehicleTypeName" class="form-label">Vehicle Type Name</label>
            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Vehicle Type Name" @error('terms') is invalid @enderror>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>