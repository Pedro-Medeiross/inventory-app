<?php

namespace App\Repository;

use App\Http\Requests\ProductsFormRequest;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class EloquentProductsRepository implements ProductsRepository
{
    public function addProduct(ProductsFormRequest $request) : Products
    {
        $product = DB::transaction(function() use ($request) {
            $product = Products::create($request->all());

            return $product;
        });

        return $product;
    }

    public function updateProduct(ProductsFormRequest $request, Products $product) : Products
    {
        $product = DB::transaction(function() use ($product, $request) {
            $product->update($request->all());

            return $product;
        });

        return $product;
    }

    public function deleteProduct(Products $product) : Products
    {
        $product = DB::transaction(function() use ($product) {
            $product->delete();

            return $product;
        });

        return $product;
    }
}
