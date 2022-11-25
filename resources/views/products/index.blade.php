<x-layout title="Products - Index">
    <div class="container">
        <h1>Products of {{ $store->name }}</h1>
        <a href="{{ route('products.create', $store->id) }}" class="btn btn-primary">Create</a>
        <a href="{{ route('stores.index') }}" class="btn btn-primary">Back</a>
        @isset($messageSuccess)
        <div class="alert alert-success">
            {{ $messageSuccess}}
        </div>
        @endisset
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('products.destroy',  $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </div>
</x-layout>

