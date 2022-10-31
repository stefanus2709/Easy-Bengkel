@extends('application')

@section('page-title')
Edit Purchase Product
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
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Edit Purchase Product {{$po_detail->product->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3">
        <form action="/po_in/{{$po_detail->purchase_in_id}}/details/update/{{$po_detail->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputPOProductQty" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$po_detail->quantity}}" min="1">
                @error('quantity')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPOProductPrice" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$po_detail->price}}" min="1">
                @error('price')
                <span class="text-danger">{{$message}}</span>
                @enderror
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
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });

</script>
@endsection
