@extends('layouts.dashboard')
@section('content')
    <div class="col-lg-10">
        <table class="table table-rounded">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Photo</th>
                <th scope="col">Product Category</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>

                    <td>{{ $product->name }}</td>
                    <td><img src="{{ asset('uploads/thumbnail_photo') }}/{{ $product->thumbnail }}" alt="" width="150"></td>
                    <td>{{ $product->producttocategoryrel->category_name }}</td>
                    <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td><button href="#"  class="btn btn-danger btn-sm">Delete</button></td>

                    </form>
                    <td><a href="{{ route('product.edit',$product->id) }}"  class="btn btn-success btn-sm">Edit</a></td>

                  </tr>
                @empty
                    <td class="alert alert-info text-center">No Producr Found Yet</td>
                @endforelse


            </tbody>
          </table>
    </div>
@endsection

