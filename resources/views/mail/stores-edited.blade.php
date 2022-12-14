@component('mail::message')
    # Store has been edited successfully.

    - Store Name: {{ $storeName }}
    - Store Address: {{ $storeAddress }}

    @component('mail::button', ['url' => route('stores.show', $store)])
        View Store
    @endcomponent
@endcomponent
