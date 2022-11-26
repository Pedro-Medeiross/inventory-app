<?php

namespace App\Repository;

use App\Http\Requests\ProductsFormRequest;
use App\Models\Products;

interface ProductsRepository
{
public function addProduct(ProductsFormRequest $request) : Products;
    public function updateProduct(ProductsFormRequest $request, Products $product) : Products;
    public function deleteProduct(Products $product) : Products;
}
