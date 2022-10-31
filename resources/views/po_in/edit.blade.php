@extends('application')

@section('page-title')
Edit Purchase In
@endsection

@section('custom-css')
<style>
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
    .po-item-content,
    #deleteSupplierModal div {
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
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Edit Purchase In
        </p>
        @if ($po_in->finalized)
        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#finalizePurchaseInModal" disabled>
            Finalized
        </button>
        @else
        <button type="button" class="btn btn-success fs-16px" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#finalizePurchaseInModal">
            Finalize
        </button>
        @endif

    </div>
    <div class="bg-white rounded p-3 mb-2">
        <form action="/po_in/update/{{$po_in->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                @if(!blank($po_in->details))
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
                    data-max-options="1" name="supplier_id">
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
                <input type="date" class="form-control" id="date" name="date" placeholder="Input Purchase Date"
                    value="{{$po_in->date}}">
                @error('date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/po_in" class="btn btn-secondary">Back</a>
                @if ($po_in->finalized)
                <button type="submit" class="btn btn-primary" disabled>Update</button>
                @else
                <button type="submit" class="btn btn-primary">Update</button>
                @endif
            </div>
        </form>
    </div>
</div>
<div class="px-4 po-item-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Item list stock
        </p>
    </div>
    <div class="bg-white rounded mb-3">
        <div class="px-3 py-3">
            <form action="/po_in/{{$po_in->id}}/details/store" method="POST">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-md-5">
                        @if (!blank($po_in->supplier->products))
                        <label for="select" class="form-label">Select Product</label>
                        <select id="select-product" class="selectpicker form-control" data-live-search="true" multiple
                            data-max-options="1" name="product_id">
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
                    <div class="col-sm">
                        <label for="inputQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            placeholder="Input Quantity" min="1">
                        @error('quantity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="Input Selling Price" min="0">
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @if ($po_in->finalized)
                    <div class="col-sm" style="vertical-align: bottom">
                        <button type="submit" class="btn btn-primary" disabled>Create</button>
                    </div>
                    @else
                    <div class="col-sm" style="vertical-align: bottom">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    @endif
                </div>
            </form>
        </div>
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

<!-- Delete Purchase In Product Modal -->
<div class="modal" id="deletePurchaseInProductModal" tabindex="-1" aria-labelledby="deletePurchaseInProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deletePurchaseInProductModalLabel">Delete Purchase In Product</p>
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

<!-- Finalize Purchase In Modal -->
<div class="modal" id="finalizePurchaseInModal" tabindex="-1" aria-labelledby="finalizePurchaseInModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="finalizePurchaseInModalLabel">Finalize Purchase In</p>
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
