@extends('application')

@section('page-title')
Category
@endsection
@section('category','active text-white')

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
    @include('category.create')
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-2 align-middle">
        <p class="fs-22px mb-0 pb-0 fw-bolder">
            Category Lists
        </p>
    </div>
    <div class="bg-white rounded">
        <table id="datatable" class="table">
            <thead>
                <tr class="table-tr-style" style="font-size: 16px">
                    <th class="poppins-medium text-center" style="padding-left: 30px !important;">#</th>
                    <th class="poppins-medium">Name</th>
                    <th  class="poppins-medium text-center" style="width: 8%; padding-right: 30px !important;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <form action="/category/delete/{{$category->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <tr class="poppins-medium" style="font-size: 14px">
                        <td style="width: 3%; padding-left: 30px !important;">{{$loop->iteration}}</td>
                        <td style="width: 80%;">{{$category->name}}</td>
                        <td class="text-center" style="width: 10%; padding-right: 30px !important;">
                            <a href="/category/edit/{{$category->id}}"  class="btn btn-info  btn-action-style" style="text-align: center">
                                <i class="icofont-pencil-alt-2 text-light"></i></a>
                            <button type="button" class="btn btn-danger btn-action-style"
                                data-bs-toggle="modal" data-bs-target="#deleteCategoryModal"
                                data-myId="{{$category->id}}">
                                <i class="icofont-trash text-light"></i>
                            </button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Category Modal -->
<div class="modal" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="deleteCategoryModalLabel">Delete Category</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="/category/delete" method="POST" id="editForm">
                        @csrf
                        @method('DELETE')
                        <div class="">
                            <label class="form-label">Are you sure you want to delete this category?</label>
                            <p>The data will gone forever</p>
                            <input type="hidden" class="mb-3" name="category_id" id="category_id">
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

    $('#deleteCategoryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #category_id').val(id);
    });
</script>
@endsection
