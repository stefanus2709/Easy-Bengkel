<!-- Button trigger modal -->
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        {{$mechanic->name}} History Service
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="serviceTable">
        <thead>
            <tr style="background-color: #293A80; color: white; border-radius: 5px">
                <th class="text-center">#</th>
                <th>Description</th>
                <th>Date</th>
                <th>Time</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $itr = 1;
            @endphp
            @foreach ($quotations as $quotation)
                @foreach ($quotation->service_details as $detail)
                    @if ($quotation->finalized)
                    <tr>
                        <td class="text-center" style="width: 5%;">{{$itr}}</td>
                        <td style="width: 20%;">{{$detail->description}}</td>
                        <td style="width: 8%;">{{$quotation->date}}</td>
                        <td style="width: 8%;">{{$detail->time}}</td>
                        <td style="width: 8%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                        <td style="width: 5%;">
                            <a href="/quotation/edit/{{$detail->quotation_id}}" class="btn btn-success fs-16px"><i class="icofont-search-1"></i></a>
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
