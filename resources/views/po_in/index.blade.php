@extends('application')

@section('page-title')
Purchase Order
@endsection
@section('po_in','active text-white')

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
    @include('po_in.create')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Purchase Order
        </p>
    </div>
    <div class="bg-white rounded">
        <table class="table" id="datatable">
            <thead>
                <tr class="table-tr-style" style="font-size: 16px">
                    <th class="poppins-medium text-center" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Supplier Name</th>
                    <th class="poppins-medium">Date</th>
                    <th class="poppins-medium">Total Purchase</th>
                    <th class="poppins-medium">Status</th>
                    <th class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($po_ins as $po_in)
                <tr class="poppins-medium" style="font-size: 14px">
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 25%;">{{$po_in->supplier->name}}</td>
                    <td style="width: 25%;">{{$po_in->date}}</td>
                    <td style="width: 15%;">{{number_format($po_in->total_price, 0, ',', '.')}}</td>
                    @if ($po_in->finalized)
                    <td style="width: 12%; padding-right: 30px !important;">
                        <button class="btn btn-success ml-2" style="font-size: 12px;">Finalized</button>
                    </td>
                    @else
                    <td style="width: 12%; padding-right: 30px !important;">
                        <button class="btn btn-danger ml-2" style="font-size: 12px;">Not Finalized</button>
                    </td>
                    @endif
                    <td class="text-center" style="width: 12%; padding-right: 30px !important;">
                        @if (!$po_in->finalized)
                        <a href="/po_in/edit/{{$po_in->id}}" class="btn btn-info  btn-action-style">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </a>
                        @else
                        <a href="/po_in/edit/{{$po_in->id}}" class="btn btn-success btn-action-style">
                            <i class="icofont-search-1"></i></a>
                        @endif
                        <button type="button" class="btn btn-danger btn-action-style"
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

<!-- Delete Purchase Order Modal -->
<div class="modal" id="deletePurchaseInModal" tabindex="-1" aria-labelledby="deletePurchaseInModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deletePurchaseInModalLabel">Delete Purchase Order</p>
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
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
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
