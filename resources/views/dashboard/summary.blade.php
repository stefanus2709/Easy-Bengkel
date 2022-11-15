<div class="d-flex justify-content-between" style="padding-bottom: 15px">
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #53BEEA; overflow: hidden; margin-right: 15px" data-bs-toggle="modal"
        data-bs-target="#totalAsset">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">Total Assets</p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">Rp
                    {{number_format($total_asset, 0, ',', '.')}}</p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
    <!-- Total Asset Modal -->
    {{-- <div class="modal fade" id="totalAsset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Total Assets</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-primary">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Bought Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$asset->name}}</td>
                                <td>{{number_format($asset->quantity, 0, ',', '.')}}</td>
                                <td>{{number_format($asset->price, 0, ',', '.')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}

    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #49A361; overflow: hidden; margin-right: 15px">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">Total Profit</p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">Rp
                    {{number_format($total_profit, 0, ',', '.')}}</p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #CD5542; overflow: hidden; margin-right: 15px">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">Total Income</p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    Rp {{number_format($total_income, 0, ',', '.')}}</p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>

    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #384AAD; overflow: hidden;">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">
                    Total Expense
                </p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    Rp {{number_format($total_expense, 0, ',', '.')}}
                </p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
</div>

<div class="d-flex justify-content-between">
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #3693BB; overflow: hidden; margin-right: 15px">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">
                    Total Product
                </p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    {{count($products)}}
                </p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #E79F3C; overflow: hidden; margin-right: 15px">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">
                    Low Stock Products
                </p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    {{count($low_products)}}
                </p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #CD5542; overflow: hidden; margin-right: 15px;">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">
                    Supplier
                </p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    {{count($suppliers)}}
                </p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #384AAD; overflow: hidden;">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">
                    Best Mechanic
                </p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    -----------
                </p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-coins"></i>
            </div>
        </div>
    </a>
</div>
