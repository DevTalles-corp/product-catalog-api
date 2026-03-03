<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderByDesc("id")->get();
        return response()->json(
            [
                "data" => $products
            ]
        );
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
        $validated = $request->validate([
            "name" => ["required", "string", "min:2"],
            "price" => ["required", "numeric", "min:0.01"],
            "stock" => ["required", "integer", "min:0"]
        ]);
        $product = Product::create($validated);
        return response()->json([
            "message" => "Producto creado satisfactoriamente",
            "data" => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json(
            [
                "data" => $product
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            "name" => ["sometimes", "string", "min:2"],
            "price" => ["sometimes", "numeric", "min:0.01"],
            "stock" => ["sometimes", "integer", "min:0"]
        ]);
        $product->update($validated);
        return response()->json([
            "message" => "Producto actualizado satisfactoriamente",
            "data" => $product->refresh()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json([
            "message" => "Producto eliminado correctamente"
        ]);
    }
}
