<?php

namespace App\Repository;

use App\Http\Requests\StoresFormRequest;
use App\Models\Store;

interface StoresRepository
{
    public function addStore(StoresFormRequest $request) : Store;
    public function updateStore(StoresFormRequest $request, Store $store) : Store;
    public function deleteStore(Store $store) : Store;
}
