<!-- Button trigger modal -->
@section('quotation','active text-white')
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Service List
    </p>
</div>
<div class="bg-white rounded mb-3">
    @if (!$quotation->finalized && $quotation->mechanic_id != null)
    <div class="px-3 py-3">
        <form class="row g-3 needs-validation" action="/service/{{$quotation->id}}/details/store" method="POST" novalidate>
            @csrf
            <div class="col-md-4">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Input Description" required>
                <div class="invalid-feedback">
                    Please input description
                </div>
            </div>
            <div class="col-md-4">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" placeholder="Input Price" required>
                <div class="invalid-feedback">
                    Please input service time
                </div>
            </div>
            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Input Price" min="1" required>
                <div class="invalid-feedback">
                    Please input service price (more than 0)
                </div>
            </div>
            @if (!$quotation->finalized)
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            @endif
        </form>
    </div>
    @endif
    <div>
        <table class="table" id="service-table">
            <thead>
                <tr class="table-tr-style">
                    <th class="poppins-medium" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Description</th>
                    <th class="poppins-medium">Time</th>
                    <th class="poppins-medium">Price</th>
                    @if (!$quotation->finalized)
                    <th class="poppins-medium text-center" style="padding-right: 30px !important;">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->service_details as $detail)
                <tr class="poppins-medium" style="font-size: 14px">
                    @if (!$quotation->finalized)
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 27%;">{{$detail->description}}</td>
                    <td style="width: 27%;"><time>{{$detail->time}}</time></td>
                    <td style="width: 27%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                    <td class="text-center" style="width: 12%; padding-right: 30px !important;">
                        <button type="button" class="btn btn-danger btn-action-style"
                            data-bs-toggle="modal" data-bs-target="#deleteQuotationServiceModal"
                            data-myId="{{$detail->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                    @else
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 30%;">{{$detail->description}}</td>
                    <td style="width: 30%;"><time>{{$detail->time}}</time></td>
                    <td style="width: 30%;">{{number_format($detail->price, 0, ',', '.')}}</td>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="d-flex justify-content-between mb-2 align-middle px-3 pb-3 fw-bolder">
            <div>Total Service Price</div>
            <div>{{number_format($quotation->total_service_price($quotation), 0, ',', '.')}}</div>
        </div>
    </div>
</div>

<!-- Delete Quotation Service Modal -->
<div class="modal" id="deleteQuotationServiceModal" tabindex="-1" aria-labelledby="deleteQuotationServiceModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteQuotationServiceModalLabel">Delete Quotation Service</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/service/{{$quotation->id}}/details/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this service?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="service_detail_id" id="service_detail_id">
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
