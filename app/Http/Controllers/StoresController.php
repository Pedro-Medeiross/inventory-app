<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresFormRequest;
use App\Models\Store;
use App\Repository\StoresRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoresController extends Controller
{
    public function __construct(private StoresRepository $repository)
    {
    }

    public function index(Request $request)
    {
        $messageSuccess = session('message.success');
        return view('stores.index')
            ->with('stores', Store::all())
            ->with('messageSuccess', $messageSuccess);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(StoresFormRequest $request)
    {
        $store = $this->repository->addStore($request);

        return to_route('stores.index')
            ->with('message.success', "Store '{$store->name}' created successfully");
    }

    public function edit(Store $store)
    {
        return view('stores.edit')
            ->with('store', $store);

    }

    public function update(Store $store, StoresFormRequest $request)
    {
        $store = $this->repository->updateStore($request ,$store);

        return to_route('stores.index')->with('message.success', "Store '$store->name' updated successfully");
    }

    public function destroy(Store $store)
    {
        $store = $this->repository->deleteStore($store);

        return to_route('stores.index')->with('message.success', "Store '$store->name' deleted successfully");
    }

    public function show(Store $store)
    {
        return view('products.index')
            ->with('store', $store)
            ->with('products', $store->products);
    }
}
