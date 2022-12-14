<div class="container">
    <form action="{{ $action }}" method="post">
        @csrf
        @if($update)
            @method('put')
        @endif
        <div class="col">
            <div class="form-outline">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" @isset($name)value="{{ $name }}"@endisset>
            </div>
        </div>
        <div>
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" @isset($description)value="{{ $description }}"@endisset>
        </div>
        <div>
            <label for="address" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control" @isset($price)value="{{ $price }}"@endisset>
        </div>
        <div>
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" @isset($quantity)value="{{ $quantity }}"@endisset>
        </div>
        <div>
            <label for="store_id" class="form-label" hidden>Store</label>
            <input type="text" name="store_id" id="store_id" class="form-control" value="{{ $store->id }}" hidden>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('stores.show', $store->id) }}" class="btn btn-primary">Cancel</a>
    </form>
</div>
