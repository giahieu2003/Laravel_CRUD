<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.store', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'category_id' => 'required|integer',
            'upload' => 'required|image|mimes:png,jpg|max:2048',
            'price' => 'required|numeric',
            'status' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $form_data = $request->only('name','price','sale_price','status','description','category_id');

        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        $form_data['image'] = $file_name;
        
        Product::create($form_data);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'category_id' => 'required|integer',
            'upload' => 'required|image|mimes:png,jpg|max:2048',
            'price' => 'required|numeric',
            'status' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        
        $form_data = $request->only('name','price','sale_price','status','description','category_id');
        
        if ($request->has('upload')) {
            $file_name = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
        }
       
        $product->update($form_data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
