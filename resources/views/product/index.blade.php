@extends('application')

@section('page-title')
Product
@endsection
@section('product','active text-white')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('success')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(Session::has('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{Session::get('failed')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="px-4 py-4 main-content">
    @include('product.create')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Product Lists
        </p>
    </div>
    <div class="bg-white rounded">
        <table class="table" id="datatable">
            <thead>
                <tr class="table-tr-style" style="font-size: 16px">
                    <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Name</th>
                    <th class="poppins-medium">Category</th>
                    <th class="poppins-medium">Brand</th>
                    <th class="poppins-medium">Vehicle</th>
                    <th class="poppins-medium">Supplier</th>
                    <th class="poppins-medium">Qty</th>
                    <th class="poppins-medium">Price</th>
                    <th class="poppins-medium">Selling Price</th>
                    <th class="poppins-medium text-center" style="padding-right: 30px !important;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="poppins-medium" style="font-size: 14px">
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 20%;">{{$product->name}}</td>
                    <td style="width: 8%;">{{$product->category->name}}</td>
                    <td style="width: 8%;">{{$product->brand->name}}</td>
                    <td style="width: 8%;">{{$product->vehicle_type->name}}</td>
                    <td style="width: 15%;">{{$product->supplier->name}}-{{$product->supplier->company_name}}</td>
                    <td style="width: 5%;">{{number_format($product->quantity, 0, ',', '.')}}</td>
                    <td style="width: 8%;">{{number_format($product->price, 0, ',', '.')}}</td>
                    <td style="width: 8%;">{{number_format($product->selling_price, 0, ',', '.')}}</td>
                    <td class="text-center" style="width: 10%; padding-right: 30px !important;">
                        <a href="/product/edit/{{$product->id}}" class="btn btn-info  btn-action-style" style="text-align: center">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-action-style"
                            data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-myId="{{$product->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Product Modal -->
<div class="modal" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteProductModalLabel">Delete Product</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/product/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this product?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="product_id" id="product_id">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            "pagingType": "first_last_numbers",
            language: {
                search: "",
            },
        });

        $('#deleteProductModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.attr('data-myId');

            var modal = $(this)
            modal.find('.modal-body #product_id').val(id);
        });
    });
</script>
@endsection
