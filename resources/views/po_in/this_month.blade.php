@extends('application')

@section('page-title')
{{ date('F')}} Purchase In
@endsection

@section('custom-css')
<style>
    #datatable {
        font-size: 14px;
    }

    .dataTables_info {
        display: none;
    }

    .active > .page-link, .page-link.active, .btn-primary{
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link{
        color: #293A80;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content {
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
            {{ date('F')}} Purchase In
        </p>
    </div>
    <div>
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Total Purchase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($total_purchases as $po_in)
                <tr>
                    <td style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 25%;">{{$po_in->supplier->name}}</td>
                    <td style="width: 25%;">{{$po_in->date}}</td>
                    <td style="width: 25%;">{{number_format($po_in->total_price, 0, ',', '.')}}</td>
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
