<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFormRequest;
use App\Models\Products;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function create(Store $store)
    {
        return view('products.create')
            ->with('store', $store);
    }

    public function store(ProductsFormRequest $request)
    {
        $product = Products::create($request->all());

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '{$product->name}' created successfully");
    }

    public function edit(Products $product)
    {
        return view('products.edit')
            ->with('product', $product)
            ->with('store', $product->store);
    }

    public function update(ProductsFormRequest $request, Products $product)
    {
        $product->update($request->all());

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '{$product->name}' updated successfully");
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '{$product->name}' deleted successfully");
    }
}
