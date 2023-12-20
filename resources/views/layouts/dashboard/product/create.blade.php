@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder=" Name" name="name">
            </div>
            <div class="form-group">
              <label>Category</label>
              <select class="form-control" name="category_id">
                <option value="">Select Your Category</option>
                @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->category_name}}</option>
                @endforeach


              </select>
            </div>
            <div class="form-group">
              <label>Purchase Price</label>
              <input type="number" class="form-control" placeholder="Purchase Price" name="purchase_price">
            </div>
            <div class="form-group">
              <label>Reguler Price</label>
              <input type="number" class="form-control" placeholder="Reguler Price" name="reguler_price">
            </div>
            <div class="form-group">
              <label>Discount Price</label>
              <input type="number" class="form-control" placeholder="Discount Price" name="discount_price">
            </div>
            <div class="form-group">
              <label>Short Description</label>
              <input type="text" class="form-control" placeholder="Short Description" name="short_description">
            </div>
            <div class="form-group">
              <label>Long Description</label>
              <input type="text" class="form-control" placeholder="Long Description" name="long_description">
            </div>
            <div class="form-group">
                <label>Additional Information</label>
                <input type="text" class="form-control" placeholder="Additional Information" name="additional_information">
              </div>
            <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" class="form-control" placeholder="Thumbnail" name="thumbnail">
              </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
    </div>
@endsection

