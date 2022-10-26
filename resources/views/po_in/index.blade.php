@extends('application')

@section('page-title')
Purchase In
@endsection

@section('custom-css')
<style>
    #datatable {
        font-size: 14px;
    }

    .dataTables_info {
        display: none;
    }

    .active > .page-link, .page-link.active, .btn-primary{
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link{
        color: #293A80;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content,
    #deletePurchaseInModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('success')}}</strong>
</div>
@elseif(Session::has('failed'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('failed')}}</strong>
</div>
@endif
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Purchase In
        </p>
        <a href="/po_in/create" class="btn btn-primary fs-16px">Create PO</a>
    </div>
    <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Total Purchase</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($po_ins as $po_in)
                <tr>
                    <td style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 25%;">{{$po_in->supplier->name}}</td>
                    <td style="width: 25%;">{{$po_in->date}}</td>
                    <td style="width: 25%;">{{number_format($po_in->total_price, 0, ',', '.')}}</td>
                    <td style="width: 10%;">
                        @if (!$po_in->finalized)
                        <a href="/po_in/edit/{{$po_in->id}}" class="btn btn-info fs-16px"><i class="icofont-pencil-alt-2 text-light"></i></a>
                        @else
                        <a href="/po_in/edit/{{$po_in->id}}" class="btn btn-success fs-16px"><i class="icofont-search-1"></i></a>
                        @endif
                        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#deletePurchaseInModal" data-myId="{{$po_in->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Purchase In Modal -->
<div class="modal" id="deletePurchaseInModal" tabindex="-1" aria-labelledby="deletePurchaseInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deletePurchaseInModalLabel">Delete PurchaseIn</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/po_in/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this PO?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="po_in_id" id="po_in_id">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });

        $('#deletePurchaseInModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #po_in_id').val(id);
        });
    });

</script>
@endsection
