<!-- Button trigger modal -->
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        History Product Stock
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="stockTable">
        <thead>
            <tr class="table-tr-style">
                <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                <th class="poppins-medium">Supplier</th>
                <th class="poppins-medium">Date</th>
                <th class="poppins-medium">Qty</th>
                <th class="poppins-medium">Buy Price</th>
                <th class="poppins-medium">Total Price</th>
                <th class="poppins-medium text-center" style="padding-right: 30px !important;">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $itr = 1;
            @endphp
            @foreach ($stock_details as $detail)
            @if ($detail->purchaseOrder->finalized)
            <tr class="poppins-medium" style="font-size: 14px">
                <td style="width: 3%; padding-left: 30px !important;">{{$itr}}</td>
                <td style="width: 20%;">{{$detail->purchaseOrder->supplier->name}} - {{$detail->purchaseOrder->supplier->company_name}}</td>
                <td style="width: 8%;">{{$detail->purchaseOrder->date}}</td>
                <td style="width: 8%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                <td style="width: 8%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                <td style="width: 8%;">{{number_format($detail->quantity*$detail->price, 0, ',', '.')}}</td>
                <td class="text-center" style="width: 8%; padding-right: 30px !important;">
                    <a href="/po/edit/{{$detail->purchase_order_id}}" target="_blank" class="btn btn-success btn-action-style">
                        <i class="icofont-search-1"></i>
                    </a>
                </td>
            </tr>
            @php
                $itr++;
            @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>
