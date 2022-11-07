@extends('application')

@section('page-title')
Quotation
@endsection
@section('quotation','active text-white')
@section('custom-css')
<style>
    #datatable {
        font-size: 14px;
    }

    .dataTables_info {
        display: none;
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

    .active>.page-link,
    .page-link.active,
    .btn-primary {
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link {
        color: #293A80;
    }

    .main-content,
    #deleteQuotationModal div {
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
    @include('quotation.create')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Quotation
        </p>
    </div>
    <div class="bg-white rounded">
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th class="text-center">#</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Mechanic</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotations as $quotation)
                <tr>
                    <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 16%;">
                        {{$quotation->customer_name == null ? 'No Name' : $quotation->customer_name}}</td>
                    <td style="width: 16%;">{{$quotation->date}}</td>
                    <td style="width: 16%;">
                        {{$quotation->mechanic_id == null ? 'No Mechanic' : $quotation->mechanic->name}}</td>
                    <td style="width: 16%;">
                        {{number_format($quotation->total_price == 0 ? $quotation->total_service_product_price($quotation) : $quotation->total_price, 0, ',', '.')}}
                    </td>
                    @if ($quotation->finalized)
                    <td style="width: 16%;"><button class="btn btn-success ml-2" style="font-size: 10px;">
                            Finalized</button>
                    </td>
                    @else
                    <td style="width: 16%;"><button class="btn btn-danger ml-2" style="font-size: 10px;">Not
                            Finalized</button>
                    </td>
                    @endif
                    <td style="width: 10%;">
                        @if (!$quotation->finalized)
                        <a href="/quotation/edit/{{$quotation->id}}" class="btn btn-info fs-16px"><i
                                class="icofont-pencil-alt-2 text-light"></i></a>
                        @else
                        <a href="/quotation/edit/{{$quotation->id}}" class="btn btn-success fs-16px"><i
                                class="icofont-search-1"></i></a>
                        @endif
                        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#deleteQuotationModal"
                            data-myId="{{$quotation->id}}">
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
<div class="modal" id="deleteQuotationModal" tabindex="-1" aria-labelledby="deleteQuotationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteQuotationModalLabel">Delete Quotation</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/po_in/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this Quotation?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="quotation_id" id="quotation_id">
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

        $('#deleteQuotationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #quotation_id').val(id);
        });
    });

</script>
@endsection
