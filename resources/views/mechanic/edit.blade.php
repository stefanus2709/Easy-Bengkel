@extends('application')

@section('page-title')
Edit Mechanic
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Edit Mechanic {{$mechanic->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3 mb-3">
        <form action="/mechanic/update/{{$mechanic->id}}" method="POST" id="editForm">
            @csrf
            @method('PATCH')
            <input type="hidden" name="mechanic_id" id="mechanic_id">
            <div>
                <label for="inputSupplierName" class="form-label">Mechanic Name</label>
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Input Supplier Name" value="{{$mechanic->name}}"
                    @error('name') is invalid @enderror>
            </div>
            <div>
                <label for="inputCompanyName" class="form-label">Salary</label>
                <input type="text" class="form-control mb-3" value="{{$mechanic->salary}}" disabled>
            </div>
            <div>
                <label for="inputPhoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control mb-3" id="phone_number" name="phone_number" value="{{$mechanic->phone_number}}"
                    placeholder="Input Phone Number" @error('phone_number') is invalid @enderror>
            </div>
            <div>
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control mb-3" id="address" name="address" placeholder="Input Address" value="{{$mechanic->address}}"
                    @error('address') is invalid @enderror>
            </div>
            <div class="text-end">
                <a href="/mechanic" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<div class="px-4 main-content">
    @include('mechanic.service-history')
</div>
<div class="px-4 main-content">
    @include('mechanic.salary-taken-history')
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var serviceTable = $('#serviceTable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
    });
    $(document).ready(function () {
        var salaryTable = $('#salaryTable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
    });

</script>
@endsection
