@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                Category Details
            </div>
            <div class="card-body">
                <table class="table table-rounded">
                    <tr>
                        <td>Category Name</td>
                        <td>{{ $category->category_name }}</td>

                    </tr>
                    <tr>
                        <td>Category Slug</td>
                        <td>{{ $category->category_slag }}</td>

                    </tr>
                    <tr>
                        <td>Category Photo</td>
                        <td><img style="width: 70px;" src="{{ asset('uploads/category_photo') }}/{{ $category->category_photo }}" alt=""></td>

                    </tr>
                    <tr>
                        <td>Category Time</td>
                        <td>{{ $category->created_at }}</td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
