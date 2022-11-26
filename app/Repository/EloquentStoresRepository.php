<?php

namespace App\Repository;

use App\Http\Requests\StoresFormRequest;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class EloquentStoresRepository implements StoresRepository
{
    public function addStore(StoresFormRequest $request) : Store
    {
        $store = DB::transaction(function() use ($request) {
            $store = Store::create($request->all());

            return $store;
        });

        return $store;
    }

    public function updateStore(StoresFormRequest $request, Store $store) : Store
    {
        $store = DB::transaction(function() use ($store, $request) {
            $store->update($request->all());

            return $store;
        });

        return $store;
    }

public function deleteStore(Store $store) : Store
    {
        $store = DB::transaction(function() use ($store) {
            $store->delete();

            return $store;
        });

        return $store;
    }
}
