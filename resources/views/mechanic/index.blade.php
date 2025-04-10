@extends('application')

@section('page-title')
Mechanic
@endsection
@section('mechanic','active text-white')

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
    @include('mechanic.create')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Mechanic Lists
        </p>
    </div>
    <div class="bg-white rounded">
        <table class="table" id="datatable">
            <thead>
                <tr class="table-tr-style">
                    <th class="poppins-medium text-center" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Name</th>
                    <th class="poppins-medium">Salary</th>
                    <th class="poppins-medium">Phone Number</th>
                    <th class="poppins-medium">Address</th>
                    <th class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mechanics as $mechanic)
                <tr class="poppins-medium" style="font-size: 14px">
                    <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                    <td style="width: 15%;">{{$mechanic->name}}</td>
                    <td style="width: 20%;">{{number_format($mechanic->salary, 0, ',', '.')}}</td>
                    <td style="width: 15%;">{{$mechanic->phone_number}}</td>
                    <td style="width: 25%;">{{$mechanic->address}}</td>
                    <td class="text-center" style="width: 10%; padding-right: 30px !important;">
                        <button type="button" class="btn btn-success btn-action-style" style="margin-right: 1px" data-bs-toggle="modal"
                            data-bs-target="#salaryMechanicModal{{$mechanic->id}}"><i
                                class="icofont-money"></i></button>
                        <a href="/mechanic/edit/{{$mechanic->id}}" class="btn btn-info  btn-action-style" style="text-align: center">
                            <i class="icofont-pencil-alt-2 text-light"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-action-style" data-bs-toggle="modal"
                            data-bs-target="#deleteMechanicModal" data-myId="{{$mechanic->id}}">
                            <i class="icofont-trash text-light"></i>
                        </button>
                    </td>
                </tr>
                <!-- Salary Mechanic Modal -->
                <div class="modal" id="salaryMechanicModal{{$mechanic->id}}" tabindex="-1"
                    aria-labelledby="salaryMechanicModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title fs-22px" id="salaryMechanicModalLabel">Salary Mechanic</p>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <form action="/mechanic/take/salary/{{$mechanic->id}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="">
                                            <div>
                                                <label class="form-label">Mechanic
                                                    Name</label>
                                                <input type="text" class="form-control mb-3"
                                                    placeholder="{{$mechanic->name}}" disabled>
                                            </div>
                                            <div>
                                                <label class="form-label">Salary</label>
                                                <input type="text" class="form-control mb-3"
                                                    placeholder="{{$mechanic->salary}}" disabled>
                                            </div>
                                            @if ($mechanic->salary <= 0) <div>
                                                <label class="form-label">Take Salary</label>
                                                <input type="text" class="form-control mb-3" placeholder="No Salary"
                                                    disabled>
                                        </div>
                                        @else
                                        <div>
                                            <label for="inputTake" class="form-label">Take Salary</label>
                                            <input type="text" class="form-control mb-3" id="take" name="take"
                                                placeholder="Input Salary Take" @error('take') is invalid @enderror>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-danger">Take Salary</button>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Mechanic Modal -->
<div class="modal" id="deleteMechanicModal" tabindex="-1" aria-labelledby="deleteMechanicModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteMechanicModalLabel">Delete Mechanic</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/mechanic/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this mechanic?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="mechanic_id" id="mechanic_id">
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
            "pagingType": "first_last_numbers",
            "lengthMenu":  [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"]],
            language: {
                search: "",
            }
        });
    });

    $('#deleteMechanicModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #mechanic_id').val(id);
    });
</script>
@endsection
