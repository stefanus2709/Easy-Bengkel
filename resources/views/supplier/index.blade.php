@extends('application')

@section('page-title')
    Brand
@endsection

@section('content')
    @include('brand.create')
    <div style="background-color: blueviolet">
        <h1>INDEX BRAND</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
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
                            <td>{{$loop->iteration}}</td>
                            <td>{{$brand->name}}</td>
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
@endsection