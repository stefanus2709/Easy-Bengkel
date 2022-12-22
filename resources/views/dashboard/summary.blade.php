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

    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #49A361; overflow: hidden; margin-right: 15px">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">Total Profit</p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">Rp
                    {{number_format($total_profit, 0, ',', '.')}}</p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px" class="icofont-money"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #384AAD; overflow: hidden; margin-right: 15px">
        <div class="d-flex px-2">
            <div class="container-summary-text fw-bold" style="width: 100%">
                <p class="mb-2 pb-0 poppins-medium fs-16px">Total Income</p>
                <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                    Rp {{number_format($total_income, 0, ',', '.')}}</p>
            </div>
            <div class="d-flex">
                <i style="font-size: 75px"  class="icofont-dotted-up"></i>
            </div>
        </div>
    </a>

    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #CD5542; overflow: hidden;">
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
                <i style="font-size: 75px" class="icofont-dotted-down"></i>
            </div>
        </div>
    </a>
</div>

<div class="d-flex justify-content-between">
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #8B7E74; overflow: hidden; margin-right: 15px">
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
                <i style="font-size: 75px" class="icofont-box"></i>
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
                <i style="font-size: 75px" class="icofont-battery-low"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #439A97; overflow: hidden; margin-right: 15px;">
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
                <i style="font-size: 75px" class="icofont-people"></i>
            </div>
        </div>
    </a>
    <a href="" class="container-sm py-4 container-summary-box text-decoration-none"
        style="background-color: #513252; overflow: hidden;">
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
                <i style="font-size: 75px" class="icofont-ui-user"></i>
            </div>
        </div>
    </a>
</div>
