<!-- Button trigger modal -->
<div class="d-flex justify-content-between mb-2 align-middle">
    <p class="fs-22px mb-0 pb-0 fw-bolder">
        Service List
    </p>
</div>
<div class="bg-white rounded mb-3">
    @if (!$quotation->finalized && $quotation->mechanic_id != null)
    <div class="px-3 py-3">
        <form action="/service/{{$quotation->id}}/details/store" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-md-5">
                    @if (!blank($services))
                    <input type="hidden" name="quotation_id" value="{{$quotation->id}}">
                    <label for="select" class="form-label">Select Service</label>
                    <select id="select-service" class="selectpicker form-control" data-live-search="true" multiple
                        data-max-options="1" name="service_id">
                        @foreach ($services as $service)
                        <option value="{{$service->id}}" data-rc="{{$service->price}}">
                            {{$service->name}}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <fieldset disabled>
                        <label for="disabledSelect" class="form-label">Select Service</label>
                        <select id="disabledSelect" class="form-select">
                            <option>No Services Data</option>
                        </select>
                    </fieldset>
                    @endif
                    @error('service_id')
                    <span class="text-danger">The service field is required.</span>
                    @enderror
                </div>
                <div class="col-sm">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Input Price" min="0"
                        disabled>
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                @if ($quotation->finalized)
                <div class="col-sm" style="vertical-align: bottom">
                    <button type="submit" class="btn btn-primary" disabled>Create</button>
                </div>
                @else
                <div class="col-sm" style="vertical-align: bottom">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                @endif
            </div>
        </form>
    </div>
    @endif
    <div>
        <table class="table" id="service-table">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th class="text-center">#</th>
                    <th>Service Name</th>
                    <th>Price</th>
                    @if (!$quotation->finalized)
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->service_details as $detail)
                <tr>
                    @if (!$quotation->finalized)
                    <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 40%;">{{$detail->service->name}}</td>
                    <td style="width: 40%;">{{number_format($detail->service->price, 0, ',', '.')}}</td>
                    <td style="width: 10%;">
                        <button type="button" class="btn btn-danger fs-16px" style="font-size: 16px;"
                            data-bs-toggle="modal" data-bs-target="#deleteQuotationServiceModal"
                            data-myId="{{$detail->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                    @else
                    <td class="text-center" style="width: 10%;">{{$loop->iteration}}</td>
                    <td style="width: 45%;">{{$detail->service->name}}</td>
                    <td style="width: 45%;">{{number_format($detail->service->price, 0, ',', '.')}}
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
                <p class="modal-title fs-22px" id="deleteQuotationServiceModalLabel">Delete Quotation Product</p>
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
