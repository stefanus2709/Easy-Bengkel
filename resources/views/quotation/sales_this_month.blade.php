@extends('application')

@section('page-title')
{{ date('F')}} Sales
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
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            {{ date('F')}} Sales
        </p>
    </div>
    <div class="bg-white rounded">
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th class="text-center">#</th>
                    <th>Customer Name</th>
                    <th>Date</th>
                    <th>Total Sales</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($total_sales as $quotation)
                <tr>
                    <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 25%;">{{$quotation->customer_name == null ? 'No Name' : $quotation->customer_name}}</td>
                    <td style="width: 25%;">{{$quotation->date}}</td>
                    <td style="width: 25%;">{{number_format($quotation->total_price, 0, ',', '.')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
    });
</script>
@endsection
