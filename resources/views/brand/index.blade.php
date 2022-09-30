@extends('application')

@section('page-title')
Brand
@endsection

@section('content')
<div>
    <p>
        <h1>Brand Lists</h1>
    </p>
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-between mb-3 px-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBrandModal">
            Create Brand
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBrandModal">
            Create Brand
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
                @foreach ($brands as $brand)
                <form action="/brand/delete/{{$brand->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <tr>
                        <td style="width: 5%;">{{$loop->iteration}}</td>
                        <td style="width: 80%;">{{$brand->name}}</td>
                        <td>
                            <a href="/brand/edit/{{$brand->id}}" class="btn btn-success">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
        @if(blank($brands))
        <h5>No Data</h5>
        @endif
    </div>
</div>
<!-- Modal -->
<div class="modal" id="createBrandModal" tabindex="-1" aria-labelledby="createBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBrandModalLabel">Create Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('brand.create')
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection
