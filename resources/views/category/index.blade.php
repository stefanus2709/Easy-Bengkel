@extends('application')

@section('page-title')
Category
@endsection

@section('content')
<div>
    <p>
        <h1>Category Lists</h1>
    </p>
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 px-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            Create Category
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            Create Category
        </button>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
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
                        <td style="width: 5%;">{{$loop->iteration}}</td>
                        <td style="width: 80%;">{{$category->name}}</td>
                        <td>
                            <a href="/category/edit/{{$category->id}}" class="btn btn-success">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
        @if(blank($categories))
        <h5>No Data</h5>
        @endif
    </div>
</div>
<!-- Modal -->
<div class="modal" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('category.create')
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection
