<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        {{$mechanic->name}} Salary Taken
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="salaryTable">
        <thead>
            <tr style="background-color: #293A80; color: white; border-radius: 5px">
                <th class="text-center">#</th>
                <th>Date</th>
                <th>Salary Taken</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mechanic->salary_details as $detail)
            <tr>
                <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                <td style="width: 15%;">{{$detail->time}}</td>
                <td style="width: 25%;">Rp.
                    {{number_format($detail->salary_taken, 0, ',', '.')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

