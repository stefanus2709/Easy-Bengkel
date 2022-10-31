<!-- Button trigger modal -->
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        History Product Sold
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="soldTable">
        <thead>
            <tr style="background-color: #293A80; color: white; border-radius: 5px">
                <th class="text-center">#</th>
                <th>Supplier</th>
                <th>Date</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $itr = 0;
            @endphp
            @foreach ($sold_details as $detail)
            @if ($detail->quotation->finalized)
            <tr>
                <td class="text-center" style="width: 5%;">{{$itr}}</td>
                <td style="width: 20%;">{{$detail->quotation->customer_name == null ? "No Name" : $detail->quotation->customer_name}}</td>
                <td style="width: 8%;">{{$detail->quotation->date}}</td>
                <td style="width: 8%;">{{number_format($detail->quantity, 0, ',', '.')}}</td>
                <td style="width: 8%;">{{number_format($detail->selling_price, 0, ',', '.')}}</td>
                <td style="width: 8%;">{{number_format($detail->quantity*$detail->selling_price, 0, ',', '.')}}</td>
                <td style="width: 5%;">
                    <a href="/quotation/edit/{{$detail->quotation_id}}" class="btn btn-success fs-16px"><i class="icofont-search-1"></i></a>
                </td>
            </tr>
            @php
                $itr = ++;
            @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>
