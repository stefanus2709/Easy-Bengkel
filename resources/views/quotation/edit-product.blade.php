@extends('application')

@section('page-title')
Edit Quotation Product
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Edit Quotation Product {{$quotation_detail->product->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3">
        <form class="needs-validation" action="/quotation/{{$quotation_detail->quotation_id}}/details/update/{{$quotation_detail->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputQuotationProductQty" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$quotation_detail->quantity}}" min="1" max="{{$quotation_detail->product->quantity}}" required>
                <div class="invalid-feedback">
                    Must be more than 0 & less than equal to product stock
                </div>
            </div>
            {{-- <div class="mb-3">
                <label for="inputQuotationProductPrice" class="form-label">Selling Price</label>
                <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{$quotation_detail->selling_price}}" min="0">
                @error('selling_price')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div> --}}
            <div class="text-end">
                <a href="/quotation/edit/{{$quotation_detail->quotation_id}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });
</script>
@endsection
