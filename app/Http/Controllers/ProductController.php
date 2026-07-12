<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Actions\Product\CreateProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Actions\Product\DeleteProductAction;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return response()->json($products, 200);
    }

    public function store(StoreProductRequest $request, CreateProductAction $action)
    {
        $product = $action->execute($request->validated());
        return response()->json([
            'status' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $action)
    {
        $action->execute($product, $request->validated());
        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully',
            'data' => $product->refresh() 
        ], 200);
    }

    public function destroy(Product $product, DeleteProductAction $action)
    {
        $action->execute($product);
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    }
}