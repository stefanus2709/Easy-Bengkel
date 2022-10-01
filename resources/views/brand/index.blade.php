@extends('application')

@section('page-title')
Brand
@endsection

@section('custom-css')
<style>
    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Brand Lists
        </p>
        <button type="button" class="btn btn-primary fs-16px" data-bs-toggle="modal" data-bs-target="#createBrandModal">
            Create Brand
        </button>
    </div>
    <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 80%;">{{$brand->name}}</td>
                    <td style="width: 10%;">
                        <button type="button" class="btn btn-info fs-16px edit" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#editBrandModal" data-myName="{{$brand->name}}"
                            data-myId="{{$brand->id}}">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </button>
                        <button type="button" class="btn btn-danger fs-16px edit" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal" data-myId="{{$brand->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Create Brand Modal -->
<div class="modal" id="createBrandModal" tabindex="-1" aria-labelledby="createBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="createBrandModalLabel">Create Brand</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('brand.create')
            </div>
        </div>
    </div>
</div>

<!-- Edit Brand Modal -->
<div class="modal" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="editBrandModalLabel">Edit Brand</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('brand.edit')
            </div>
        </div>
    </div>
</div>

<!-- Delete Brand Modal -->
<div class="modal" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteBrandModalLabel">Delete Brand</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/brand/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this brand?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="brand_id" id="brand_id">
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

    $('#editBrandModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.attr('data-myName');
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #brand_id').val(id);
    });

    $('#deleteBrandModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #brand_id').val(id);
    });

</script>
@endsection
