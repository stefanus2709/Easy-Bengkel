<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        {{$mechanic->name}} Salary Taken
    </p>
</div>
<div class="bg-white rounded mb-3">
    <table class="table" id="salaryTable">
        <thead>
            <tr class="table-tr-style">
                <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                <th class="poppins-medium">Date</th>
                <th class="poppins-medium">Salary Taken</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mechanic->salary_details as $detail)
            <tr class="poppins-medium" style="font-size: 14px">
                <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                <td style="width: 25%;">{{$detail->time}}</td>
                <td style="width: 25%;">
                    {{number_format($detail->salary_taken, 0, ',', '.')}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

