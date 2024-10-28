@extends('admin.layout.master')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products {{ $products->total() }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary pull-right">Add Product</a>
                    @if(session()->has('message')) <p class="flashmessage" style="color:red;">{{ session()->get('message') }}</p>@endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Favourite</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($products as $product)
                          <tr>
                            <td>{{ $products->firstItem() + $loop->index }}</td>
                            <td><img src="{{ asset('storage/uploads/images/'.$product->image) }}" width="100" alt="" /></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td> {{ $product->status_text }}</td>
                            <td>{{ $product->is_favourite_text }}</td>
                            <td>
                              <a href="{{ route('admin.product.edit', encrypt($product->id)) }}" class="btn btn-info btn-sm">Edit</a>
                              <a href="{{ route('admin.product.delete', encrypt($product->id)) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                          </tr>
                       @endforeach
                    </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                  {{ $products->links() }}
                </div>
             
                </div>
                <!-- /.card -->
    
            </div>
           
            </div>
           
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection