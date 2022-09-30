{{-- <ul>
    <li><a href="/brand">Brand</a></li>
    <li><a href="/category">Category</a></li>
    <li><a href="/item">Item</a></li>
    <li><a href="/po_in">Po In</a></li>
    <li><a href="/product">Product</a></li>
    <li><a href="/quotation">Quotation</a></li>
    <li><a href="/vehicle_type">Vehicle Type</a></li>
</ul> --}}

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/"
                    class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-primary text-decoration-none">
                    <span class="fs-6 fw-bold d-none d-sm-inline text-primary">MUTIARA JAYA MOTOR</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                    id="menu">
                    <p class="mb-2 text-dark">Main Menu</p>
                    <li class="nav-item">
                        <a href="/" class="nav-link align-middle pL-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product" class="nav-link align-middle pL-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/quotation" class="nav-link align-middle pL-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Quotation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/po_in" class="nav-link align-middle pL-3 py-1 text-dark fw-normal mb-3">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Purchase Order</span></span>
                        </a>
                    </li>

                    <p class="mb-2 text-dark">Master</p>
                    <li class="nav-item">
                        <a href="/category" class="nav-link align-middle pl-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/supplier" class="nav-link align-middle pl-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/brand" class="nav-link align-middle pl-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Brand</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/vehicle_type" class="nav-link align-middle pl-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Vehicle Type</span></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/item" class="nav-link align-middle pl-3 py-1 text-dark fw-normal">
                            <i class="icofont-dashboard"></i> <span class="ms-1 d-none d-sm-inline">Items</span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-2">
            @yield('content')
        </div>
    </div>
</div>