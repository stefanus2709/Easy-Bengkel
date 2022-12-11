@extends('application')

@section('page-title')
Edit Purchase Product
@endsection

@section('content')
<div class="px-4 py-4 main-content">
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Edit Purchase Product {{$po_detail->product->name}}
        </p>
    </div>
    <div class="bg-white rounded p-3">
        <form class="needs-validation" action="/po_in/{{$po_detail->purchase_in_id}}/details/update/{{$po_detail->id}}" method="POST" novalidate>
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="inputPOProductQty" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$po_detail->quantity}}" min="1" required>
                <div class="invalid-feedback">
                    Please input quantity (more than 0)
                </div>
            </div>
            <div class="mb-3">
                <label for="inputPOProductPrice" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{$po_detail->price}}" min="1" required>
                <div class="invalid-feedback">
                    Please input price (more than 0)
                </div>
            </div>
            <div class="text-end">
                <a href="/po_in/edit/{{$po_detail->purchase_in_id}}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    });

    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection
