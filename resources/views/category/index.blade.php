@extends('application')

@section('page-title')
Category
@endsection

@section('content')
<div class="px-4 py-4">
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 align-middle">
        <p class="fs-22px mb-0 pb-0">
            Category Lists
        </p>
        <button type="button" class="btn btn-primary fs-16px" data-bs-toggle="modal"
            data-bs-target="#createCategoryModal">
            Create Category
        </button>
    </div>
    <div>
        <table id="datatable" class="table">
            <thead>
                <tr style="background-color: #293A80; color: white; border-radius: 5px">
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <form action="/category/delete/{{$category->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <tr>
                        <td style="width: 10%;">{{$loop->iteration}}</td>
                        <td style="width: 80%;">{{$category->name}}</td>
                        <td style="width: 10%;">
                            <button type="button" class="btn btn-info fs-16px edit" style="font-size: 16px;"
                                data-bs-toggle="modal" data-bs-target="#editCategoryModal"
                                data-myName="{{$category->name}}" data-myId="{{$category->id}}">
                                <i class="icofont-pencil-alt-2 text-light"></i>
                            </button>
                            <button type="button" class="btn btn-danger fs-16px edit" style="font-size: 16px;"
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

<!-- Create Category Modal -->
<div class="modal" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="createCategoryModalLabel">Create Category</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('category.create')
            </div>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-22px" id="editCategoryModalLabel">Edit Category</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('category.edit')
            </div>
        </div>
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
<!-- Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            "pageLength": 5,
            "pagingType": 'full_numbers',
        });
    });

    $('#editCategoryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.attr('data-myName');
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #category_id').val(id);
    });

    $('#deleteCategoryModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.attr('data-myId');

        var modal = $(this)
        modal.find('.modal-body #category_id').val(id);
    });

</script>
@endsection
