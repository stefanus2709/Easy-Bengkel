<!-- Button trigger modal -->
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Create Vehicle Type
    </p>
</div>
<div class="bg-white rounded p-3 mb-3">
    <form action="/vehicle_type/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inputVehicleTypeName" class="form-label">Vehicle Type Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input Vehicle Type Name">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
