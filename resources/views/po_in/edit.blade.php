@extends('application')

@section('page-title')
Edit Purchase Order
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
            Edit Purchase Order
        </p>
        @if ($po_in->finalized)
        <button type="button" class="btn btn-success fs-16px" style="font-size: 16px;">
            Finalized
        </button>
        @else
        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#finalizePurchaseInModal">
            Not Finalize
        </button>
        @endif

    </div>
    <div class="bg-white rounded p-3 mb-2">
        <form class="needs-validation" action="/po_in/update/{{$po_in->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-3">
                @if(!blank($po_in->details) || $po_in->finalized)
                <fieldset disabled>
                    <label for="disabledSelect" class="form-label">Select Supplier</label>
                    <select id="disabledSelect" class="form-select">
                        <option>{{$po_in->supplier->name}}-{{$po_in->supplier->company_name}}</option>
                    </select>
                </fieldset>
                <input type="hidden" name="supplier_id" value="{{$po_in->supplier->id}}">
                @elseif (!blank($suppliers))
                <label for="select" class="form-label">Select Supplier</label>
                <select id="select" class="selectpicker form-control" data-live-search="true" multiple
                    data-max-options="1" name="supplier_id" required>
                    @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}-{{$supplier->company_name}}</option>
                    @endforeach
                </select>
                @endif
                @error('supplier_id')
                <span class="text-danger">The supplier field is required.</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPurchaseInDate" class="form-label">Purchase Date</label>
                @if ($po_in->finalized)
                    <input type="date" class="form-control" id="date" name="date" placeholder="Input Purchase Date"
                    value="{{$po_in->date}}" disabled>
                @else
                    <input type="date" class="form-control" id="date" name="date" placeholder="Input Purchase Date"
                    value="{{$po_in->date}}" required>
                @endif
                <div class="invalid-feedback">
                    Please input purchase date
                </div>
            </div>
            <div class="text-end">
                <a href="/po_in" class="btn btn-secondary">Back</a>
                @if (!$po_in->finalized)
                <button type="submit" class="btn btn-primary">Update</button>
                @endif
            </div>
        </form>
    </div>
</div>
<div class="px-4 po-item-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Item List Stock
        </p>
    </div>
    <div class="bg-white rounded mb-3">
        @if (!$po_in->finalized)
        <div class="px-3 py-3">
            <form class="needs-validation" action="/po_in/{{$po_in->id}}/details/store" method="POST" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        @if (!blank($po_in->supplier->products))
                        <label for="select" class="form-label">Select Product</label>
                        <select id="select-product" class="selectpicker form-control" data-live-search="true" multiple
                            data-max-options="1" name="product_id" required>
                            @foreach ($po_in->supplier->products as $product)
                            <option value="{{$product->id}}" data-rc="{{$product->price}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        @else
                        <fieldset disabled>
                            <label for="disabledSelect" class="form-label">Select Product</label>
                            <select id="disabledSelect" class="form-select">
                                <option>No Products Data</option>
                            </select>
                        </fieldset>
                        @endif
                        @error('product_id')
                        <span class="text-danger">The product field is required.</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="inputQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            placeholder="Input Quantity" min="1" required>
                        <div class="invalid-feedback">
                            Please input quantity (more than 0)
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="Input Selling Price" min="1" required readonly>
                        <div class="invalid-feedback">
                            Please input price (more than 0)
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        @endif
        <div>
            <table class="table" id="datatable">
                <thead>
                    <tr style="background-color: #293A80; color: white; border-radius: 5px">
                        <th class="text-center">#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        @if (!$po_in->finalized)
                        <th>Action</th>
                        @else
                        <th>Total Price</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($po_in->details as $detail)
                    <tr>
                        @if (!$po_in->finalized)
                        <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                        <td style="width: 35%;">{{$detail->product->name}}</td>
                        <td style="width: 20%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                        <td style="width: 25%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                        <td style="width: 10%;">
                            <a href="/po_in/{{$po_in->id}}/details/edit/{{$detail->id}}" class="btn btn-info fs-16px"><i
                                    class="icofont-pencil-alt-2 text-light"></i></a>
                            <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;"
                                data-bs-toggle="modal" data-bs-target="#deletePurchaseInProductModal"
                                data-myId="{{$detail->id}}">
                                <i class="icofont-trash text-light"></i>
                            </button>
                        </td>
                        @else
                        <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                        <td style="width: 30%;">{{$detail->product->name}}</td>
                        <td style="width: 20%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                        <td style="width: 20%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                        <td style="width: 20%;">{{number_format($detail->price*$detail->quantity, 0, ',', '.')}}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Purchase Order Product Modal -->
<div class="modal" id="deletePurchaseInProductModal" tabindex="-1" aria-labelledby="deletePurchaseInProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deletePurchaseInProductModalLabel">Delete Purchase Order Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/po_in/{{$po_in->id}}/details/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this product?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="po_detail_id" id="po_detail_id">
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

<!-- Finalize Purchase Order Modal -->
<div class="modal" id="finalizePurchaseInModal" tabindex="-1" aria-labelledby="finalizePurchaseInModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="finalizePurchaseInModalLabel">Finalize Purchase Order</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/po_in/finalize/{{$po_in->id}}" method="POST" id="editForm">
                        @csrf
                        @method('PATCH')
                        <div class="">
                            <label class="form-label">Are you sure you want to finalize this PO?</label>
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

        $('select[name=supplier_id]').selectpicker('val', '{{$po_in->supplier_id}}');

        $('#deletePurchaseInProductModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #po_detail_id').val(id);
        });

        var selection = document.getElementById("select-product");

        selection.onchange = function (event) {
            var rc = event.target.options[event.target.selectedIndex].dataset.rc;
            document.getElementById('price').value = rc;
        };
    });
</script>
@endsection
