@extends('layouts.dashboard')
@section('content')
    <div class="col-lg-10">
        <table class="table table-rounded">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>

                {{-- <th scope="col">Category Slug</th>
                <th scope="col">Category Photo</th>
                <th scope="col">Created At</th> --}}
              </tr>
            </thead>
            <tbody>

                @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td><a href="{{ route('category.show',$category->id) }}" class="btn btn-info btn-sm">Details</a></td>
                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td><button href="#"  class="btn btn-danger btn-sm">Delete</button></td>

                    </form>
                    <td><a href="{{ route('category.edit',$category->id) }}"  class="btn btn-success btn-sm">Edit</a></td>
                  
                  </tr>
                @empty
                    <td class="alert alert-info">No Category Found Yet</td>
                @endforelse


            </tbody>
          </table>
    </div>
@endsection

