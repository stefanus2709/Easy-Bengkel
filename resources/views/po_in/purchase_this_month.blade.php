@extends('application')

@section('page-title')
{{ date('F')}} Purchase Order
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
            {{ date('F')}} Purchase Order
        </p>
    </div>
    <div class="bg-white rounded">
        <table class="table" id="datatable">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th class="text-center">#</th>
                    <th>Supplier Name</th>
                    <th>Date</th>
                    <th>Total Purchase</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($total_purchases as $po_in)
                <tr>
                    <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
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
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
    });
</script>
@endsection
