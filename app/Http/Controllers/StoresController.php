<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresFormRequest;
use App\Mail\StoresCreated;
use App\Mail\StoresDeleted;
use App\Mail\StoresEdited;
use App\Models\Store;
use App\Repository\StoresRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

        \App\Events\StoresCreated::dispatch (
            $store->id,
            $store->name,
            $store->address,
        );

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

        \App\Events\StoresEdited::dispatch (
            $store->id,
            $store->name,
            $store->address,
        );

        return to_route('stores.index')->with('message.success', "Store '$store->name' updated successfully");
    }

    public function destroy(Store $store)
    {
        $store = $this->repository->deleteStore($store);

        \App\Events\StoresDeleted::dispatch(
            $store->id,
            $store->name,
            $store->address,
        );

        return to_route('stores.index')->with('message.success', "Store '$store->name' deleted successfully");
    }

    public function show(Store $store)
    {
        return view('products.index')
            ->with('store', $store)
            ->with('products', $store->products);
    }
}
