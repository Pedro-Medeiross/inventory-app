<x-layout title="Stores - Index">
    <div class="container">
        <h1>Stores</h1>
        <a href="{{ route('stores.create') }}" class="btn btn-primary">Create</a>
        @isset($messageSuccess)
            <div class="alert alert-success">
                {{ $messageSuccess}}
            </div>
        @endisset
        <table class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>
                    <img src="{{ asset('storage/' . $store->image) }}" alt="{{ $store->name }}" width="100" class="img-thumbnail">
                    </td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->description }}</td>
                    <td>{{ $store->address }}</td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('stores.show', $store->id) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('stores.destroy', $store->id)}}" method="post" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
