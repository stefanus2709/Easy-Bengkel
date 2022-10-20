@extends('application')

@section('page-title')
Create Purchase In
@endsection

@section('custom-css')
<style>
    #datatable {
        font-size: 12px;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content,
    #createPurchaseInModal div,
    #editPurchaseInModal div,
    #deletePurchaseInModal div {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Create Purchase In
        </p>
    </div>
    <form action="/quotation/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inputCustomerName" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name"
                placeholder="Input Customer Name">
            @error('customer_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date"
                placeholder="Input Date">
            @error('date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="text-end">
            <a href="/quotation" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
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
