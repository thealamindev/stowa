@extends('layouts.dashboard')

@section('content')
    <div class="col-lg-6">
        <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder=" Name" name="name" value="{{ $product->name  }}">
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
              <input type="number" class="form-control" placeholder="Purchase Price" name="purchase_price" value="{{ $product->purchase_price  }}">
            </div>
            <div class="form-group">
              <label>Reguler Price</label>
              <input type="number" class="form-control" placeholder="Reguler Price" name="reguler_price" value="{{ $product->reguler_price  }}">
            </div>
            <div class="form-group">
              <label>Discount Price</label>
              <input type="number" class="form-control" placeholder="Discount Price" name="discount_price" value="{{ $product->discount_price  }}">
            </div>
            <div class="form-group">
              <label>Short Description</label>
              <input type="text" class="form-control" placeholder="Short Description" name="short_description" value="{{ $product->short_description  }}">
            </div>
            <div class="form-group">
              <label>Long Description</label>
              <input type="text" class="form-control" placeholder="Long Description" name="long_description" value="{{ $product->long_description  }}">
            </div>
            <div class="form-group">
                <label>Additional Information</label>
                <input type="text" class="form-control" placeholder="Additional Information" name="additional_information" value="{{ $product->additional_information  }}">
              </div>
               <div class="form-group">
              <label>Old Thumbnail Photo</label>
              <img style="width: 70px;" src="{{ asset('uploads/thumbnail_photo') }}/{{ $product->thumbnail }}" alt="">
            </div>
            <div class="form-group">
                <label>Size</label>
                <!-- 2nd  -->
                <select name="sizes[]" multiple>
                @foreach($sizes as $size)
                  <option value="{{$size->size}}">{{$size->size}}</option>
                 @endforeach;

                </select>
                <!-- 2nd  -->
              </div>
               <div class="form-group">
              <label>Old Thumbnail Photo</label>
              <img style="width: 70px;" src="{{ asset('uploads/thumbnail_photo') }}/{{ $product->thumbnail }}" alt="">
            </div>
            <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" class="form-control" placeholder="Thumbnail" name="thumbnail">
              </div>

            <button type="submit" class="btn btn-primary">Edit Product</button>
          </form>
    </div>
@endsection

