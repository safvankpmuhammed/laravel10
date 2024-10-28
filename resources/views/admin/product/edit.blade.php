@extends('admin.layout.master')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.product.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="productid" value="{{ encrypt($product->id) }}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputName">Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputName" value="{{ $product->name }}" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Price</label>
                        <input type="text" class="form-control" name="price" id="exampleInputPrice" value="{{ $product->price }}" placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Catogory</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option @selected($category->id == $product->category_id) value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                    <img src="{{ asset('storage/uploads/images/'.$product->image) }}" width="100" alt="" />
                    <div class="form-group">
                        <label for="exampleInputStatus">Status</label>
                        <input type="radio" name="status" value="1" {{ $product->status == 1 ? 'checked' : '' }}> Active
                        <input type="radio" name="status" value="0" {{ $product->status == 0 ? 'checked' : '' }}> Inactive
                    </div>

                    <div class="form-group">
                        <label for="exampleInputStatus">Is Favourite</label>
                        <input type="radio" name="is_favourite" @checked($product->is_favourite == 1) value="1" > Yes
                        <input type="radio" name="is_favourite" @checked($product->is_favourite == 0) value="0" > No
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
    
  
            </div>
            <!--/.col (left) -->
        
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
     </section>
@endsection