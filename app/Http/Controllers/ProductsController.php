<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFormRequest;
use App\Mail\ProductsCreated;
use App\Mail\ProductsDeleted;
use App\Mail\ProductsEdited;
use App\Models\Products;
use App\Models\Store;
use App\Repository\ProductsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $image = $request->HasFile('productimage') ? $request->file('productimage')->store('products', 'public') : null;
        $product = Products::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'store_id' => $request->store_id,
                'image' => $image,
            ]
        );

        \App\Events\ProductsCreated::dispatch(
            $product->store_id,
            $product->id,
            $product->name,
            $product->price,
        );

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
        $oldImage = $product->image;
        if($oldImage){
            Storage::disk('public')->delete($oldImage);
        }
        $image = $request->HasFile('productimage') ? $request->file('productimage')->store('products', 'public') : null;
        $product->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image' => $image,
            ]
        );

        \App\Events\ProductsEdited::dispatch(
            $product->store_id,
            $product->id,
            $product->name,
            $product->price,
        );

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '$product->name' updated successfully");
    }

    public function destroy(Products $product)
    {
        $image = $product->image;
        if($image){
            Storage::disk('public')->delete($image);
        }
        $product = $this->repository->deleteProduct($product);

        \App\Events\ProductsDeleted::dispatch(
            $product->store_id,
            $product->id,
            $product->name,
            $product->price,
        );

        return to_route('stores.show', $product->store_id)
            ->with('message.success', "Product '{$product->name}' deleted successfully");
    }
}
