@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="category_name">
            </div>
            <div class="form-group">
              <label>Category Slag</label>
              <input type="text" class="form-control" placeholder="Category Slag" name="category_slag">
            </div>
            <div class="form-group">
              <label>Category Photo</label>
              <input type="file" class="form-control" placeholder="Category Slag" name="category_photo" onchange="document.getElementById('web').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="form-group">
             <img src="" id="web" style="width: 120px; height:120px;">
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
    </div>
@endsection

