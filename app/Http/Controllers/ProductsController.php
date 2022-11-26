<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFormRequest;
use App\Models\Products;
use App\Models\Store;
use App\Repository\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function __construct(private ProductsRepository $repository)
    {
    }

    public function create(Store $store)
    {
        return view('products.create')
            ->with('store', $store);
    }

    public function store(ProductsFormRequest $request)
    {
        $product = $this->repository->addProduct($request);

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
        $product = $this->repository->updateProduct($request, $product);

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '$product->name' updated successfully");
    }

    public function destroy(Products $product)
    {
        $product = $this->repository->deleteProduct($product);

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '{$product->name}' deleted successfully");
    }
}
