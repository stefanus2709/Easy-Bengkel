@extends('application')

@section('page-title')
Dashboard
@endsection
@section('dashboard','active text-white')

@section('content')
@if(Session::has('success'))
        <div class="alert alert-success d-flex justify-content-center align-items-center vh-10" role="alert">
            <p>Your password has been successfully reset</p>
        </div>
@endif
<div class="px-4 py-4 main-content">
    <div class="mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 poppins-medium fw-bolder" style="padding-bottom: 15px">Summary</p>
    </div>
    <div class="bg-white rounded" style="padding: 20px 30px 20px 30px">
        @include('dashboard.summary')
    </div>

    <div class="row">
        <div class="col-sm">
            @include('dashboard.today_transaction')
        </div>
        <div class="col-sm">
            @include('dashboard.today_purchase')
        </div>
    </div>
    <div>
        @include('dashboard.best_selling_product')
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable_transaction').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            "pagingType": "first_last_numbers",
            language: {
                search: "",
            },
        });
    });
    $(document).ready(function () {
        var table = $('#datatable_purchase').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
    });
    $(document).ready(function () {
        var table = $('#datatable_top_product').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            "pagingType": "first_last_numbers",
            language: {
                search: "",
            }
        });
    });
</script>
@endsection
