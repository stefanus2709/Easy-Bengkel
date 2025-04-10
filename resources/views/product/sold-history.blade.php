<!-- Button trigger modal -->
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        History Product Sold
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="soldTable">
        <thead>
            <tr class="table-tr-style">
                <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                <th class="poppins-medium">Customer</th>
                <th class="poppins-medium">Date</th>
                <th class="poppins-medium">Qty</th>
                <th class="poppins-medium">Sell Price</th>
                <th class="poppins-medium">Total Price</th>
                <th class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $itr = 1;
            @endphp
            @foreach ($sold_details as $detail)
            @if ($detail->quotation->finalized)
            <tr class="poppins-medium" style="font-size: 14px">
                <td style="width: 3%; padding-left: 30px !important;">{{$itr}}</td>
                <td style="width: 20%;">{{$detail->quotation->customer_name == null ? "No Name" : $detail->quotation->customer_name}}</td>
                <td style="width: 8%;">{{$detail->quotation->date}}</td>
                <td style="width: 8%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                <td style="width: 8%;">{{number_format($detail->selling_price, 0, ',', '.')}}</td>
                <td style="width: 8%;">{{number_format($detail->quantity*$detail->selling_price, 0, ',', '.')}}</td>
                <td class="text-center" style="width: 8%; padding-right: 30px !important;">
                    <a href="/quotation/edit/{{$detail->quotation_id}}" target="_blank"class="btn btn-success btn-action-style">
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
