@extends('application')

@section('page-title')
Vehicle Type
@endsection

@section('custom-css')
<style>
    .dataTables_info {
        display: none;
    }

    .active>.page-link,
    .page-link.active,
    .btn-primary {
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link {
        color: #293A80;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
        padding: 4px 10px 10px 10px;
    }

    .dataTables_length,
    .dataTables_filter {
        padding: 10px 10px 4px 10px;
    }

    .main-content,
    #deleteVehicleTypeModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{Session::get('failed')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="px-4 py-4 main-content">
    @include('vehicle_type.create')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Vehicle Type Lists
        </p>
    </div>
    <div class="bg-white rounded">
        <table id="datatable" class="table">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th class="text-center">#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicle_types as $vehicle_type)
                <form action="/vehicle_type/delete/{{$vehicle_type->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <tr>
                        <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                        <td style="width: 80%;">{{$vehicle_type->name}}</td>
                        <td style="width: 10%;">
                            <a href="/vehicle_type/edit/{{$vehicle_type->id}}" class="btn btn-info fs-16px"><i
                                    class="icofont-pencil-alt-2 text-light"></i></a>
                            <button type="button" class="btn btn-danger fs-16px edit" style="font-size: 16px;"
                                data-bs-toggle="modal" data-bs-target="#deleteVehicleTypeModal"
                                data-myId="{{$vehicle_type->id}}">
                                <i class="icofont-trash text-light"></i>
                            </button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Vehicle Type Modal -->
<div class="modal" id="deleteVehicleTypeModal" tabindex="-1" aria-labelledby="deleteVehicleTypeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteVehicleTypeModalLabel">Delete Vehicle Type</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/vehicle_type/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this vehicle type?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="vehicle_type_id" id="vehicle_type_id">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
    });

    $('#deleteVehicleTypeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #vehicle_type_id').val(id);
    });

</script>
@endsection
