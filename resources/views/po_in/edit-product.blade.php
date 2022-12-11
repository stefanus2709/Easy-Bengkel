@extends('application')

@section('page-title')
Edit Purchase Product
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Edit Purchase Product {{$po_detail->product->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3">
        <form class="needs-validation" action="/po_in/{{$po_detail->purchase_in_id}}/details/update/{{$po_detail->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputPOProductQty" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$po_detail->quantity}}" min="1" required>
                <div class="invalid-feedback">
                    Please input quantity (more than 0)
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPOProductPrice" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$po_detail->price}}" min="1" required>
                <div class="invalid-feedback">
                    Please input price (more than 0)
                </div>
            </div>
            <div class="text-end">
                <a href="/po_in/edit/{{$po_detail->purchase_in_id}}" class="btn btn-secondary">Back</a>
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
