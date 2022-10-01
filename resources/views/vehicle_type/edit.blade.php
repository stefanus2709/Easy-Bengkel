<div>
    <form action="/vehicle_type/update" method="POST" id="editForm">
        @csrf
        @method('PATCH')
        <div>
            <label for="inputVehicleTypeName" class="form-label">Vehicle Type Name</label>
            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Vehicle Type Name" @error('name') is invalid @enderror>
            <input type="hidden" name="vehicle_type_id" id="vehicle_type_id">
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>