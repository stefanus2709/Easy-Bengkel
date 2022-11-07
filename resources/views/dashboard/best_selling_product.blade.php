<div class="mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 poppins-medium br-1">Best Selling Products</p>
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
