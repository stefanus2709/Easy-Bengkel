@extends('application')

@section('page-title')
Dashboard
@endsection
@section('dashboard','active text-white')
@section('custom-css')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap');
    .dataTables_info {
        display: none;
    }

    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center
    }

    .main-content,
    #createSupplierModal div,
    #editSupplierModal div,
    #deleteSupplierModal div {
        font-family: 'Poppins';
    }

    .active > .page-link, .page-link.active, .btn-primary{
        background-color: #293A80;
        border-color: #293A80;
    }

    .page-link{
        color: #293A80;
    }

    .container-summary-box {
        align-items: center;
        border-radius: 10px;
    }

    .container-summary-box i {
        font-size: 33px;
        color: white;
    }

    .container-summary-text p {
        font-size: 13px;
        color: white;
    }

    .container-summary-text p.value {
        font-size: 20px;
    }

    /* font fammily */
    .poppins-light {
        font-family: 'Poppins', sans-serif;
        font-weight: 300;
    }
    .poppins-regular {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
    }
    .poppins-medium {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
    }
    .poppins-semibold {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
    .poppins-extrabold {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
    }

    /* untuk tampilan table */
    .dataTables_length {
        padding-left: 30px;
    }
    .dataTables_filter {
        padding-right: 30px;
    }
    .table-style {

    }
    .table-tr-style {
        background-color: #293A80;
        color: white;
    }

    /* untuk btn action */
    .btn-action-style {
        width: 35px;
        height: 35px;
        padding: 4px;
        font-size: 16px;
        text-align: center !important;
    }

    /* br */
    .br-1 {
        padding-bottom: 15px!important;
        padding-top: 20px;
    }

    /* custom search datatables */
    #datatable_transaction_filter .form-control {
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
        background-repeat: no-repeat;
        background-color: #fff;
        background-position: 0px 3px !important;
        padding-left: 23px;
    }
    #datatable_top_product_filter .form-control {
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
        background-repeat: no-repeat;
        background-color: #fff;
        background-position: 0px 3px !important;
        padding-left: 23px;
    }
    #datatable_purchase_filter .form-control {
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PHN2ZyAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgICB4bWxuczpjYz0iaHR0cDovL2NyZWF0aXZlY29tbW9ucy5vcmcvbnMjIiAgIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiAgIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgICB2ZXJzaW9uPSIxLjEiICAgaWQ9InN2ZzQ0ODUiICAgdmlld0JveD0iMCAwIDIxLjk5OTk5OSAyMS45OTk5OTkiICAgaGVpZ2h0PSIyMiIgICB3aWR0aD0iMjIiPiAgPGRlZnMgICAgIGlkPSJkZWZzNDQ4NyIgLz4gIDxtZXRhZGF0YSAgICAgaWQ9Im1ldGFkYXRhNDQ5MCI+ICAgIDxyZGY6UkRGPiAgICAgIDxjYzpXb3JrICAgICAgICAgcmRmOmFib3V0PSIiPiAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9zdmcreG1sPC9kYzpmb3JtYXQ+ICAgICAgICA8ZGM6dHlwZSAgICAgICAgICAgcmRmOnJlc291cmNlPSJodHRwOi8vcHVybC5vcmcvZGMvZGNtaXR5cGUvU3RpbGxJbWFnZSIgLz4gICAgICAgIDxkYzp0aXRsZT48L2RjOnRpdGxlPiAgICAgIDwvY2M6V29yaz4gICAgPC9yZGY6UkRGPiAgPC9tZXRhZGF0YT4gIDxnICAgICB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLC0xMDMwLjM2MjIpIiAgICAgaWQ9ImxheWVyMSI+ICAgIDxnICAgICAgIHN0eWxlPSJvcGFjaXR5OjAuNSIgICAgICAgaWQ9ImcxNyIgICAgICAgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjAuNCw4NjYuMjQxMzQpIj4gICAgICA8cGF0aCAgICAgICAgIGlkPSJwYXRoMTkiICAgICAgICAgZD0ibSAtNTAuNSwxNzkuMSBjIC0yLjcsMCAtNC45LC0yLjIgLTQuOSwtNC45IDAsLTIuNyAyLjIsLTQuOSA0LjksLTQuOSAyLjcsMCA0LjksMi4yIDQuOSw0LjkgMCwyLjcgLTIuMiw0LjkgLTQuOSw0LjkgeiBtIDAsLTguOCBjIC0yLjIsMCAtMy45LDEuNyAtMy45LDMuOSAwLDIuMiAxLjcsMy45IDMuOSwzLjkgMi4yLDAgMy45LC0xLjcgMy45LC0zLjkgMCwtMi4yIC0xLjcsLTMuOSAtMy45LC0zLjkgeiIgICAgICAgICBjbGFzcz0ic3Q0IiAvPiAgICAgIDxyZWN0ICAgICAgICAgaWQ9InJlY3QyMSIgICAgICAgICBoZWlnaHQ9IjUiICAgICAgICAgd2lkdGg9IjAuODk5OTk5OTgiICAgICAgICAgY2xhc3M9InN0NCIgICAgICAgICB0cmFuc2Zvcm09Im1hdHJpeCgwLjY5NjQsLTAuNzE3NiwwLjcxNzYsMC42OTY0LC0xNDIuMzkzOCwyMS41MDE1KSIgICAgICAgICB5PSIxNzYuNjAwMDEiICAgICAgICAgeD0iLTQ2LjIwMDAwMSIgLz4gICAgPC9nPiAgPC9nPjwvc3ZnPg==);
        background-repeat: no-repeat;
        background-color: #fff;
        background-position: 0px 3px !important;
        padding-left: 23px;
    }
    #datatable_transaction_paginate, #datatable_purchase_paginate, #datatable_top_product_paginate{
        padding-right: 30px;
    }
</style>
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <div class="mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 poppins-medium" style="padding-bottom: 15px">Summary</p>
    </div>
    <div class="bg-white rounded" style="padding: 20px 30px 20px 30px">
        <div class="d-flex justify-content-between" style="padding-bottom: 15px">
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #53BEEA; overflow: hidden; margin-right: 15px">
                <div class="d-flex px-2">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">Total Profit</p>
                        <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">Rp {{number_format($total_profit, 0, ',', '.')}}</p>
                    </div>
                    <div class="d-flex">
                        <i style="font-size: 75px" class="icofont-coins"></i>
                    </div>
                </div>
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;"></div>
            </a>
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #49A361; overflow: hidden; margin-right: 15px">
                <div class="d-flex px-2">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">Total Income</p>
                        <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                            Rp {{number_format($total_income, 0, ',', '.')}}</p>
                    </div>
                    <div class="d-flex">
                        <i style="font-size: 75px" class="icofont-coins"></i>
                    </div>
                </div>
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;">
                    
                </div>
            </a>
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #CD5542; overflow: hidden; margin-right: 15px">
                <div class="d-flex px-2">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
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
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;"></div>
            </a>
            {{-- <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #53BEEA; overflow: hidden;">
                <div class="d-flex">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
                            Total Income
                        </p>
                        <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                            {{count($products)}}
                        </p>
                    </div>
                    <div class="d-flex">
                        <i style="font-size: 75px" class="icofont-coins"></i>
                    </div>
                </div>
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;">
                    
                </div>
            </a> --}}
            
            {{-- <a href="/product/low"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-danger border border-danger text-decoration-none" style="margin-right: 15px">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Low Stock Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        {{count($low_products)}}
                    </p>
                </div>
            </a>
             --}}
            {{-- <a href="/po_in/this_month"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-warning border border-warning text-decoration-none" style="margin-right: 15px">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Total Purchase ({{ date('F')}})
                    </p>
                    <p class="mb-0 pb-0 value">
                        Rp {{number_format($total_purchase, 0, ',', '.')}}
                    </p>
                </div>
            </a> --}}
            {{-- <a href="/quotation/this_month"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-primary border border-primary"  style="margin-right: 15px">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Total Sales ({{ date('F')}})
                    </p>
                    <p class="mb-0 pb-0 value">
                        Rp {{number_format($total_sales, 0, ',', '.')}}
                    </p>
                </div>
            </a> --}}
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #384AAD; overflow: hidden;">
                <div class="d-flex px-2">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
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
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;">
                    
                </div>
             </a>
        </div>

        <div class="d-flex justify-content-between">
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #3693BB; overflow: hidden; margin-right: 15px">
                <div class="d-flex">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
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
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;"></div>
            </a>

            {{-- <a href="/product/low"
                class="container-sm d-flex justify-content-evenly py-4 container-summary-box bg-danger border border-danger text-decoration-none"  style="margin-right: 15px">
                <div class="d-flex">
                    <i class="icofont-inbox"></i>
                </div>
                <div class="container-summary-text fw-bold">
                    <p class="mb-0 pb-0">
                        Low Stock Products
                    </p>
                    <p class="mb-0 pb-0 value">
                        {{count($low_products)}}
                    </p>
                </div>
            </a> --}}
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #E79F3C; overflow: hidden; margin-right: 15px">
                <div class="d-flex">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
                            Supplier
                        </p>
                        <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                            {{count($products)}}
                        </p>
                    </div>
                    <div class="d-flex">
                        <i style="font-size: 75px" class="icofont-coins"></i>
                    </div>
                </div>
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;"></div>
            </a>
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #CD5542; overflow: hidden; margin-right: 15px; visibility: hidden;">
                <div class="d-flex px-2">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
                            -----------
                        </p>
                        <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                            -----------
                        </p>
                    </div>
                    <div class="d-flex">
                        <i style="font-size: 75px" class="icofont-coins"></i>
                    </div>
                </div>
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;"></div>
            </a>
            <a href="" 
                class="container-sm py-4 container-summary-box text-decoration-none" style="background-color: #384AAD; overflow: hidden; visibility: hidden;">
                <div class="d-flex px-2">
                    <div class="container-summary-text fw-bold" style="width: 100%">
                        <p class="mb-0 pb-0 poppins-medium fs-16px">
                            -----------
                        </p>
                        <p class="mb-0 pb-0 value poppins-medium" style="font-size: 22px">
                        -----------
                        </p>
                    </div>
                    <div class="d-flex">
                        <i style="font-size: 75px" class="icofont-coins"></i>
                    </div>
                </div>
                <div style=" height: 22px; background-color: black; position: relative; width: 150%; left: -12px; bottom: -24px; opacity: 0.3;">
                    
                </div>
            </a>
            
        </div>
    </div>


    <div class="row">
        <div class="col-sm">
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
        </div>
        <div class="col-sm">
            <div class="mb-2 align-middle">
                <p class="fs-22px mb-0 pb-0 poppins-medium br-1">Today Purchase</p>
                <div class="bg-white rounded pt-2 pb-2">
                    <table class="table " id="datatable_purchase">
                        <thead>
                            <tr class="table-tr-style ">
                                <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                                <th class="poppins-medium">Customer</th>
                                <th class="poppins-medium">Date</th>
                                <th class="poppins-medium">Total Price</th>
                                <th class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($today_purchases as $purchase)
                            <tr>
                                <td class="poppins-medium" style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                                <td class="poppins-medium" style="width: 15%;">{{$purchase->supplier->name}}</td>
                                <td class="poppins-medium" style="width: 15%;">{{$purchase->date}}</td>
                                <td class="poppins-medium" style="width: 12%;">{{number_format($purchase->total_price, 0, ',', '.')}}</td>
                                <td class="text-center" style="width: 8%; padding-right: 30px !important;">
                                    <a href="/supplier" 
                                        class="btn btn-info  btn-action-style" style="text-align: center">
                                        <i class="icofont-pencil-alt-2 text-light"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-action-style" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal" data-myId="">
                                        <i class="icofont-trash text-light"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="mb-2 align-middle">
            <p class="fs-22px mb-0 pb-0 poppins-medium br-1">5 Best Selling Products</p>
            <div class="bg-white rounded pt-2 pb-2">
                <table class="table " id="datatable_top_product">
                    <thead>
                        <tr class="table-tr-style">
                            <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                            <th class="poppins-medium">Name</th>
                            <th class="poppins-medium">Category</th>
                            <th class="poppins-medium">Brand</th>
                            <th class="poppins-medium">Vehicle</th>
                            <th class="poppins-medium">Supplier</th>
                            <th class="poppins-medium">Qty</th>
                            <th class="poppins-medium">Price</th>
                            <th class="poppins-medium">Selling Price</th>
                            <th class="poppins-medium">Item Sold</th>
                            <th class="poppins-medium text-center" style="padding-right: 30px !important;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($best_products as $product)
                        <tr style="font-size: 14px">
                            <td class="poppins-medium" style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                            <td class="poppins-medium" style="width: 20%;">{{$product->name}}</td>
                            <td class="poppins-medium" style="width: 8%;">{{$product->category->name}}</td>
                            <td class="poppins-medium" style="width: 8%;">{{$product->brand->name}}</td>
                            <td class="poppins-medium" style="width: 8%;">{{$product->vehicle_type->name}}</td>
                            <td class="poppins-medium" style="width: 10%;">{{$product->supplier->name}}-{{$product->supplier->company_name}}</td>
                            <td class="poppins-medium" style="width: 5%;">{{number_format($product->quantity, 0, ',', '.')}}</td>
                            <td class="poppins-medium" style="width: 8%;">{{number_format($product->price, 0, ',', '.')}}</td>
                            <td class="poppins-medium fs-14px" style="width: 10%;">{{number_format($product->selling_price, 0, ',', '.')}}</td>
                            <td class="poppins-medium" style="width: 8%;">{{$product->item_sold}}</td>
                            <td class="text-center" style="width: 8%; padding-right: 30px !important;">
                                <a href="/supplier" 
                                    class="btn btn-info  btn-action-style" style="text-align: center">
                                    <i class="icofont-pencil-alt-2 text-light"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-action-style" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal" data-myId="">
                                    <i class="icofont-trash text-light"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable_transaction').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            "pagingType": "first_last_numbers",
            language: {
                search: "",
            },
            
        });
    });
    $(document).ready(function () {
        var table = $('#datatable_purchase').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
    });
    $(document).ready(function () {
        var table = $('#datatable_top_product').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            "pagingType": "first_last_numbers",
            language: {
                search: "",
            }
        });
    });
</script>
@endsection
