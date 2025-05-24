<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\saveProductRequest; // Use the correct namespace for your request class

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            // 'products' => Product::all(), // To call all products
            'products' => Product::orderBy('created_at', 'DESC')->paginate(3), // To call products with pagination
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(saveProductRequest $request)
    {
        // Post the data each field
        // $product = new Product();
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->size = $request->size;
        // $product->save();

        // Post the data by mass

        // $request->validate([
        //     "name" => "required|max:100",
        //     "description" => "nullable|min:3",
        //     "size" => "required|decimal:0,2|max:100",
        // ]);

        // Product::create($request->input());
        $product =  Product::create($request->validated());
        return redirect()->route('products.show', $product)->with('status', 'Product created successfully');
    }

    // method base on the ID parameter
    // public function show(string $id)
    // {
    //     // $product = Product::select('*')
    //     //     ->where('id', $id)
    //     //     ->get();

    //     // $product = Product::find($id);
    //     // if (!$product) {
    //     //     abort(404, "Product not found");
    //     // }

    //     $product = Product::findOrFail($id);
    //     return view('products.show', compact('product'));
    // }

    public function show(Product $product)
    {
        // The model binding will automatically resolve the product by its ID
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(saveProductRequest $request, Product $product)
    {
      $product->update($request->validated());
      return redirect()->route('products.show', $product)->with('status', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product deleted successfully');
    }
}
