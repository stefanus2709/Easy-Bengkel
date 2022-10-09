@extends('application')

@section('page-title')
Low Stock Product
@endsection

@section('custom-css')
<style>
    #datatable {
        font-size: 14px;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content,
        {
        font-family: 'Poppins';
    }

</style>
@endsection

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('success')}}</strong>
</div>
@elseif(Session::has('failed'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{Session::get('failed')}}</strong>
</div>
@endif
<div class="px-4 py-4 main-content">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Low Stock Product Lists
        </p>
    </div>
    <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Vehicle</th>
                    <th>Supplier</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Selling Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($low_products as $product)
                <tr>
                    <td style="width: 5%;">{{$loop->iteration}}</td>
                    <td style="width: 20%;">{{$product->name}}</td>
                    <td style="width: 8%;">{{$product->category->name}}</td>
                    <td style="width: 8%;">{{$product->brand->name}}</td>
                    <td style="width: 8%;">{{$product->vehicle_type->name}}</td>
                    <td style="width: 15%;">{{$product->supplier->name}}-{{$product->supplier->company_name}}</td>
                    <td style="width: 5%;">{{number_format($product->quantity, 0, ',', '.')}}</td>
                    <td style="width: 8%;">{{number_format($product->price, 0, ',', '.')}}</td>
                    <td style="width: 8%;">{{number_format($product->selling_price, 0, ',', '.')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
    });

</script>
@endsection
