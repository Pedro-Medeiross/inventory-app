<div class="container">
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
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
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control" @isset($address)value="{{ $address }}"@endisset>
        </div>
        <div>
            <label for="storeimage" class="form-label">Store Image</label>
            <input type="file" name="storeimage" id="storeimage" class="form-control" accept="image/gif, image/jpeg, image/png">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('stores.index') }}" class="btn btn-primary">Cancel</a>
    </form>
</div>
