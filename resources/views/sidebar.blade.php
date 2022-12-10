@section('custom-css')
<style>
    body {
        font-family: 'Roboto';
    }

    .content {
        font-family: 'Poppins';
    }

    .nav_item {
        height: 40px;
    }

</style>
@endsection

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="nav-width col-auto col-md-3 col-xl-2 px-sm-2 px-0 pt-2 bg-white">
            <div class="d-flex flex-column  px-3 pt-2 min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-primary text-decoration-none">
                    <span class="fs-24px fw-bold d-none d-sm-inline text-primary navbar-brand">EASYBENGKEL</span>
                </a>
                <ul class="nav nav-pills flex-column">
                    <p class="mb-2 text-dark fs-12px">MAIN MENU</p>
                    <li class="nav-item">
                        <a href="/" class="nav-link align-middle pL-3 py-1 text-dark fw-normal fs-16px @yield('dashboard')">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product" class="nav-link align-middle pL-3 py-1 text-dark fw-normal fs-16px @yield('product')">
                            <i class="icofont-dropbox"></i> <span class="ms-1 d-none d-sm-inline">Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/quotation" class="nav-link align-middle pL-3 py-1 text-dark fw-normal fs-16px @yield('quotation')">
                            <i class="icofont-papers"></i> <span class="ms-1 d-none d-sm-inline">Quotation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/po_in" class="nav-link align-middle pL-3 py-1 text-dark fw-normal fs-16px mb-3 @yield('po_in')">
                            <i class="icofont-cart"></i> <span class="ms-1 d-none d-sm-inline">Purchase Order</span>
                        </a>
                    </li>

                    <p class="mb-2 text-dark fs-12px">MASTER</p>
                    <li class="nav-item">
                        <a href="/category" class="nav-link align-middle pl-3 py-1 text-dark fw-normal fs-16px @yield('category')">
                            <i class="icofont-listing-box"></i> <span class="ms-1 d-none d-sm-inline">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/supplier" class="nav-link align-middle pl-3 py-1 text-dark fw-normal fs-16px @yield('supplier')">
                            <i class="icofont-business-man-alt-1"></i> <span class="ms-1 d-none d-sm-inline">Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/brand" class="nav-link align-middle pl-3 py-1 text-dark fw-normal fs-16px @yield('brand')">
                            <i class="icofont-tag"></i> <span class="ms-1 d-none d-sm-inline">Brand</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/vehicle_type" class="nav-link align-middle pl-3 py-1 text-dark fw-normal fs-16px @yield('vehicle_type')">
                            <i class="icofont-car-alt-4"></i> <span class="ms-1 d-none d-sm-inline">Vehicle Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/mechanic" class="nav-link align-middle pl-3 py-1 text-dark fw-normal fs-16px @yield('mechanic')">
                            <i class="icofont-wrench"></i> <span class="ms-1 d-none d-sm-inline">Mechanic</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col px-0 py-0 content" style="background-color: #F1F1F1;">
            @include('navbar')
            @yield('content')
        </div>
    </div>
</div>

@yield('scripts')
