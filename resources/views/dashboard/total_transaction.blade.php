<div class="mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 poppins-medium br-1">Today transaction</p>
    <div class="bg-white rounded pt-2 pb-2">
        <table class="table " id="datatable_transaction">
            <thead>
                <tr class="table-tr-style ">
                    <th class="poppins-medium text-center" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Customer</th>
                    <th class="poppins-medium">Date</th>
                    <th class="poppins-medium">Mechanic</th>
                    <th class="poppins-medium">Total Price</th>
                    <th class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($today_quotations as $quotation)
                <tr style="font-size: 14px">
                    <td class="poppins-medium" style="width: 3%; padding-left: 30px !important; ">{{$loop->iteration}}</td>
                    <td class="poppins-medium" style="width: 15%;">{{$quotation->customer_name == null ? 'No Name' : $quotation->customer_name}}</td>
                    <td class="poppins-medium" style="width: 15%;">{{$quotation->date}}</td>
                    <td class="poppins-medium" style="width: 15%;">{{$quotation->mechanic_id == null ? 'No Mechanic' : $quotation->mechanic->name}}</td>
                    <td class="poppins-medium" style="width: 13%;">{{number_format($quotation->total_price == 0 ? $quotation->total_service_product_price($quotation) : $quotation->total_price, 0, ',', '.')}}</td>
                    <td class="text-center" style="width: 12%; padding-right: 30px !important;">
                        <a href="/supplier" class="btn btn-info  btn-action-style" style="text-align: center">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-action-style"
                            data-bs-toggle="modal" data-bs-target="#deleteSupplierModal" data-myId="">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
