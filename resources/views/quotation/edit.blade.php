@extends('application')

@section('page-title')
Edit Quotation
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
    .quotation-item-content,
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
            Edit Quotation
        </p>
        @if ($quotation->finalized)
        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#finalizeQuotationModal" disabled>
            Finalized
        </button>
        @else
        <button type="button" class="btn btn-success fs-16px" style="font-size: 16px;" data-bs-toggle="modal"
            data-bs-target="#finalizeQuotationModal">
            Finalize
        </button>
        @endif
    </div>
    <div class="bg-white rounded p-3 mb-2">
        <form action="/quotation/update/{{$quotation->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputQuotationDate" class="form-label">Customer Name</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Input Customer Name"
                    value="{{$quotation->customer_name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputQuotationDate" class="form-label">Quotation Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Input Quotation Date"
                    value="{{$quotation->date}}">
                @error('date')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputTotalPrice" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="total_price" name="total_price"
                    placeholder="Input Total Price" value="{{$quotation->total_price}}" disabled>
                @error('total_price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="text-end">
                <a href="/quotation" class="btn btn-secondary">Back</a>
                @if ($quotation->finalized)
                <button type="submit" class="btn btn-primary" disabled>Update</button>
                @else
                <button type="submit" class="btn btn-primary">Update</button>
                @endif
            </div>
        </form>
    </div>
</div>
<div class="px-4 quotation-item-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Quotation List
        </p>
    </div>
    <div class="bg-white rounded mb-3">
        <div class="px-3 py-3">
            <form action="/quotation/{{$quotation->id}}/details/store" method="POST">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-md-5">
                        @if (!blank($products))
                            <input type="hidden" name="quotation_id" value="{{$quotation->id}}">
                            <label for="select" class="form-label">Select Product</label>
                            <select id="select-product" class="selectpicker form-control" data-live-search="true" multiple
                                data-max-options="1" name="product_id"
                                onchange="getProductId('selling_price', this.selling_price.value)">
                                @foreach ($products as $product)
                                <option value="{{$product->id}}" data-rc="{{$product->selling_price}}">{{$product->name}}
                                </option>
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
                            placeholder="Input Quantity">
                        @error('quantity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm">
                        <label for="sellingPrice" class="form-label">Selling Price</label>
                        <input type="format_po" class="form-control" id="selling_price" name="selling_price"
                            placeholder="Input Selling Price" disabled>
                        @error('selling_price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @if ($quotation->finalized)
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
                        @if (!$quotation->finalized)
                        <th>Action</th>
                        @else
                        <th>Total Price</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotation->details as $detail)
                    <tr>
                        <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                        <td style="width: 35%;">{{$detail->product->name}}</td>
                        <td style="width: 20%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                        <td style="width: 25%;">{{number_format($detail->selling_price, 0, ',', '.')}}</td>
                        @if (!$quotation->finalized)
                        <td style="width: 10%;">
                            <a href="/quotation/{{$quotation->id}}/details/edit/{{$detail->id}}"
                                class="btn btn-info fs-16px"><i class="icofont-pencil-alt-2 text-light"></i></a>
                            <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;"
                                data-bs-toggle="modal" data-bs-target="#deleteQuotationProductModal"
                                data-myId="{{$detail->id}}">
                                <i class="icofont-trash text-light"></i>
                            </button>
                        </td>
                        @else
                        <td style="width: 10%;">{{number_format($detail->price*$detail->quantity, 0, ',', '.')}}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Delete Quotation Product Modal -->
<div class="modal" id="deleteQuotationProductModal" tabindex="-1" aria-labelledby="deleteQuotationProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteQuotationProductModalLabel">Delete Quotation Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/po_in/{{$quotation->id}}/details/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this?</label>
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
                    <form action="/po_in/finalize/{{$quotation->id}}" method="POST" id="editForm">
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
        $('select[name=product_id]').selectpicker('val', '{{$quotation->product_id}}');

        $('#deleteQuotationProductModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #po_detail_id').val(id);
        });


        // var product_price = document.querySelector("#select-product");
        // var price = product_price.options[product_price.selectedIndex].getAttribute('selling_price');
        // document.getElementById('selling_price').value = price;
        // console.log(product_price);

        var selection = document.getElementById("select-product");

        selection.onchange = function (event) {
            var rc = event.target.options[event.target.selectedIndex].dataset.rc;
            document.getElementById('selling_price').value = rc;
            console.log("rc: " + rc);
        };
    });

</script>
@endsection
