<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product_request;
use App\Models\Product_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class Product_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product_model::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product_request $request)
    {
        $product = Product_model::create($request->validated());

        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product_model::findOrFail($id);

        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product_request $request, string $id)
    {
        $validated = $request->validated();

        $product = Product_model::findOrFail($id)->update($validated);

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product_model::findOrFail($id);

        $product->delete();

        return $product;
    }

    // public function proDCategory()
    // {
    //     $leftJoin = DB::table('product')
    //         ->leftJoin('category', 'product.category_id', '=', 'category.category_id')
    //         ->select('product.*', 'category.*')
    //         ->get();

    //     return $leftJoin;
    // }

    public function prodStock()
    {
        $leftJoin = DB::table('product')
            ->leftJoin('stock', 'product.prod_id', '=', 'stock.prod_id')
            ->select('product.*', 'stock.*')
            ->get();

        return $leftJoin;
    }

    // public function store(Product_request $request)
    // {
    //     $product = Product_model::create($request->validated());

    //     return $product;
    // }
}
