<!-- Button trigger modal -->
@section('mechanic','active text-white')
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        {{$mechanic->name}} History Service
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="serviceTable">
        <thead>
            <tr class="table-tr-style">
                <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                <th class="poppins-medium">Description</th>
                <th class="poppins-medium">Date</th>
                <th class="poppins-medium">Time</th>
                <th class="poppins-medium">Price</th>
                <th class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $itr = 1;
            @endphp
            @foreach ($quotations as $quotation)
                @foreach ($quotation->service_details as $detail)
                    @if ($quotation->finalized)
                    <tr class="poppins-medium" style="font-size: 14px">
                        <td style="width: 3%; padding-left: 30px !important;">{{$itr}}</td>
                        <td style="width: 20%;">{{$detail->description}}</td>
                        <td style="width: 8%;">{{$quotation->date}}</td>
                        <td style="width: 8%;">{{$detail->time}}</td>
                        <td style="width: 8%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                        <td class="text-center" style="width: 4%; padding-right: 30px !important;">
                            <a href="/quotation/edit/{{$detail->quotation_id}}" target="_blank" class="btn btn-success  btn-action-style" style="text-align: center"><i class="icofont-search-1"></i></a>
                        </td>
                    </tr>
                    @php
                        $itr++;
                    @endphp
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
