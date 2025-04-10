@section('quotation','active text-white')

@if (!$quotation->finalized)
<div class="px-4 quotation-item-content">
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Create Product
        </p>
    </div>

    <div class="bg-white rounded p-3 mb-3">
        <div class="">
            <form class="row g-3 needs-validation" action="/quotation/{{$quotation->id}}/details/store" method="POST" novalidate>
                @csrf
                <div class="col-md-4">
                    @if (!blank($products))
                    <input type="hidden" name="quotation_id" value="{{$quotation->id}}">
                    <label for="select" class="form-label">Select Product</label>
                    <select id="select-product" class="selectpicker form-control" data-live-search="true" multiple
                        data-max-options="1" name="product_id"
                        onchange="getProductId('selling_price', this.selling_price.value)" required>
                        @foreach ($products as $product)
                        @if ($product->quantity != 0)
                        <option value="{{$product->id}}" data-rc="{{$product->selling_price}}"
                            data-qty="{{$product->quantity}}">{{$product->name}}
                        </option>
                        @endif
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
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Input Quantity"
                        min="1" max="" required>
                    <div class="invalid-feedback">
                        Quantity must be greater than 0 & less than or equal to product stock
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="sellingPrice" class="form-label">Selling Price</label>
                    <input type="number" class="form-control" id="selling_price" name="selling_price"
                        placeholder="Input Selling Price" min="1" required>
                    <div class="invalid-feedback">
                        Please input selling price (more than 0)
                    </div>
                </div>
                @if (!$quotation->finalized)
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endif
<div class="px-4 mb-4 quotation-item-content">
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Product List
        </p>
    </div>
    <div class="bg-white rounded mb-3">
        <table class="table" id="datatable">
            <thead>
                <tr class="table-tr-style">
                    <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Product Name</th>
                    <th class="poppins-medium">Quantity</th>
                    <th class="poppins-medium">Price</th>
                    @if (!$quotation->finalized)
                    <th class="poppins-medium text-center" style="padding-right: 30px !important;">Action</th>
                    @else
                    <th class="poppins-medium">Total Price</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->details as $detail)
                <tr class="poppins-medium" style="font-size: 14px">
                    @if (!$quotation->finalized)
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 35%;">{{$detail->product->name}}</td>
                    <td style="width: 20%;">
                        {{number_format($detail->quantity, 0, ',', '.')}}
                        @if($detail->product->quantity - $detail->quantity < 0 || $detail->quantity > $detail->product->quantity)
                            <button class="btn btn-danger">
                                <i class="icofont-exclamation"></i>
                            </button>
                        @endif
                    </td>
                    <td style="width: 25%;">{{number_format($detail->selling_price, 0, ',', '.')}}</td>
                    <td style="width: 10%;">
                        <a href="/quotation/{{$quotation->id}}/details/edit/{{$detail->id}}" class="btn btn-info  btn-action-style" style="text-align: center">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-action-style"
                            data-bs-toggle="modal" data-bs-target="#deleteQuotationProductModal"
                            data-myId="{{$detail->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                    @else
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 30%;">{{$detail->product->name}}</td>
                    <td style="width: 20%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                    <td style="width: 20%;">{{number_format($detail->selling_price, 0, ',', '.')}}</td>
                    <td style="width: 20%;">{{number_format($detail->selling_price*$detail->quantity, 0, ',', '.')}}
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="d-flex justify-content-between mb-2 align-middle px-3 pb-3 fw-bolder">
            <div>Total Product Price</div>
            <div>{{number_format($quotation->total_product_price($quotation), 0, ',', '.')}}</div>
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
                    <form action="/quotation/{{$quotation->id}}/details/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this product?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="quotation_detail_id" id="quotation_detail_id">
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
