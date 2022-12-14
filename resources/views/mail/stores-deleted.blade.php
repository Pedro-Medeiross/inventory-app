@component('mail::message')
    # Store has been deleted successfully.

    - Store Name: {{ $storeName }}
    - Store Address: {{ $storeAddress }}

    @component('mail::button', ['url' => route('stores.index')])
        View Stores
    @endcomponent
@endcomponent
