@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="category_name" value="{{ $category->category_name  }}">
            </div>
            <div class="form-group">
              <label>Category Slag</label>
              <input type="text" class="form-control" placeholder="Category Slag" name="category_slag" value="{{ $category->category_slag  }}">
            </div>
            <div class="form-group">
              <label>Old Category Photo</label>
              <img style="width: 70px;" src="{{ asset('uploads/category_photo') }}/{{ $category->category_photo }}" alt="">
            </div>
            <div class="form-group">
              <label>Category Photo</label>
              <input type="file" class="form-control" placeholder="Category Slag" name="category_photo">
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
    </div>
@endsection

