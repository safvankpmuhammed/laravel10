<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductSaveRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController
{
    public function list()
    {
        $products = Product::latest()->paginate(15);
        return view('admin.product.list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();      // select # from categories
        return view('admin.product.create', compact('categories'));
    }

    public function save(ProductSaveRequest $request)
    {
        $input = $request->validated();
        $fileName = '';
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $fileName = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs('uploads/images', $fileName);
            $input['image'] = $fileName;
        }
       
        Product::create($input);
        return redirect()->route('admin.product.list')->with('message', 'Product saved successfully');
    }

    public function delete($id)
    {
        $product = Product::find(decrypt($id));
        if(!empty($product)){
            Storage::delete('uploads/images/'.$product->image);
        }
        $product->delete();
        return redirect()->route('admin.product.list')->with('message', 'Product deleted successfully');
    }

    public function edit($id)
    {
        $product = Product::find(decrypt($id));
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(ProductSaveRequest $request)
    {
        $input = $request->validated();
        $productid = decrypt($request->input('productid'));
        $products = Product::find($productid);
        $fileName = '';
        if($request->hasFile('image')){
            if(!empty($products)){
                Storage::delete('uploads/images/'.$products->image);
            }
            $extension = $request->image->extension();
            $fileName = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs('uploads/images', $fileName);
            $input['image'] = $fileName;
        }
        
        $products->update($input);
        return redirect()->route('admin.product.list')->with('message', 'Product Updated successfully');
    }
}
