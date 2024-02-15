<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all()->where('user_id', Auth::user()->id);
        return response()->json(['data'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $validatedData = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'stock' => 'required|integer',
                'description' => 'required|string',
            ]);
            // Create a new product instance
            $product = new Product();
            $product->user_id = Auth::user()->id;
            $product->name = $validatedData['name'];
            $product->price = $validatedData['price'];
            $product->stock = $validatedData['stock'];
            $product->description = $validatedData['description'];
            $product->save();
            return response()->json(['message' => 'Product created successfully']);
        }catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json(['data' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $product = Product::findOrFail($id); // Find the product by ID, or throw an exception if not found
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->stock = $request->input('stock');
            $product->description = $request->input('description');
            $product->save();

            // Return a success response
            return response()->json(['message' => 'Product updated successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during update
            return response()->json(['error' => 'Failed to update product'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id); // Find the product by ID, or throw an exception if not found
            $product->delete(); // Delete the product
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during deletion
            return response()->json(['error' => 'Failed to delete product'], 500);
        }
    }

}
