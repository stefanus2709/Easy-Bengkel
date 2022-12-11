@extends('application')

@section('page-title')
Edit Quotation
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
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Edit Quotation
        </p>
        @if ($quotation->finalized)
        <button type="button" class="btn btn-success fs-16px" style="font-size: 16px;">
            Finalized
        </button>
        @else
        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#finalizeQuotationModal">
            Not Finalized
        </button>
        @endif
    </div>
    <div class="bg-white rounded p-3 mb-2">
        <form class="needs-validation" action="/quotation/update/{{$quotation->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-3">
                @if(!blank($quotation->service_details) || $quotation->finalized)
                <fieldset disabled>
                    <label for="disabledSelect" class="form-label">Select Mechanic</label>
                    <select id="disabledSelect" class="form-select">
                        <option>{{$quotation->mechanic_id == null ? 'No Mechanic' : $quotation->mechanic->name}}
                        </option>
                    </select>
                </fieldset>
                <input type="hidden" name="mechanic_id" value="{{$quotation->mechanic_id}}">
                @elseif (!blank($mechanics))
                <label for="select" class="form-label">Select Mechanic</label>
                <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                    data-max-options="1" name="mechanic_id" required>
                    <option value="">No Mechanic</option>
                    @foreach ($mechanics as $mechanic)
                    <option value="{{$mechanic->id}}">{{$mechanic->name}}</option>
                    @endforeach
                </select>
                @endif
                @error('mechanic_id')
                <span class="text-danger">The mechanic field is required.</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputCustomerName" class="form-label">Customer Name</label>
                @if($quotation->finalized)
                <input type="name" class="form-control" id="customer_name" name="customer_name"
                    placeholder="Input Customer Name"
                    value="{{$quotation->customer_name == null ? "No Name" : $quotation->customer_name}}" disabled>
                @else
                <input type="name" class="form-control" id="customer_name" name="customer_name"
                    placeholder="Input Customer Name" value="{{$quotation->customer_name}}">
                @endif
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputQuotationDate" class="form-label">Quotation Date</label>
                @if($quotation->finalized)
                <input type="date" class="form-control" id="date" name="date" placeholder="Input Quotation Date"
                    value="{{$quotation->date}}" disabled>
                @else
                <input type="date" class="form-control" id="date" name="date" placeholder="Input Quotation Date"
                    value="{{$quotation->date}}" required>
                @endif
                <div class="invalid-feedback">
                    Please input quotation date
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTotalPrice" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="total_price" name="total_price"
                    placeholder="Input Total Price"
                    value="{{number_format($quotation->total_price == 0 ? $quotation->total_service_product_price($quotation) : $quotation->total_price, 0, ',', '.')}}"
                    disabled>
                @error('total_price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/quotation" class="btn btn-secondary">Back</a>
                @if (!$quotation->finalized)
                <button type="submit" class="btn btn-primary">Update</button>
                @endif
            </div>
        </form>
    </div>
</div>
@if ($quotation->mechanic_id != null)
<div class="px-4 mb-4 quotation-item-content">
    @include('quotation.service-list')
</div>
@endif
<div class="px-4 quotation-item-content">
    @include('quotation.product-list')
</div>

<!-- Finalize Quotation Modal -->
<div class="modal" id="finalizeQuotationModal" tabindex="-1" aria-labelledby="finalizeQuotationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="finalizeQuotationModalLabel">Finalize Quotation</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/quotation/finalize/{{$quotation->id}}" method="POST" id="editForm">
                        @csrf
                        @method('PATCH')
                        <div class="">
                            <label class="form-label">Are you sure you want to finalize this Quotation?</label>
                            <p>This action cannot be undone!</p>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Finalize</button>
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

        var serviceTable = $('#service-table').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });

        // $('select[name=product_id]').selectpicker('val', '{{$quotation->product_id}}');

        $('#deleteQuotationProductModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #quotation_detail_id').val(id);
        });

        $('#deleteQuotationServiceModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #service_detail_id').val(id);
        });

        $('select[name=mechanic_id]').selectpicker('val', '{{$quotation->mechanic_id}}');

        // var product_price = document.querySelector("#select-product");
        // var price = product_price.options[product_price.selectedIndex].getAttribute('selling_price');
        // document.getElementById('selling_price').value = price;
        // console.log(product_price);

        var selection = document.getElementById("select-product");
        var selectionService = document.getElementById("select-service");

        selection.onchange = function (event) {
            var rc = event.target.options[event.target.selectedIndex].dataset.rc;
            var qty = event.target.options[event.target.selectedIndex].dataset.qty;
            document.getElementById('selling_price').value = rc;
            document.getElementById('quantity').value = qty;
            document.getElementById('quantity').max = qty;
        };

        selectionService.onchange = function (event) {
            var rc = event.target.options[event.target.selectedIndex].dataset.rc;
            document.getElementById('price').value = rc;
        };
    });
</script>
@endsection
