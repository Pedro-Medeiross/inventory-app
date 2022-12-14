@component('mail::message')
    # Product has been edited successfully.

    - Product Name: {{ $productName }}
    - Product Price: {{ $productPrice }}

    @component('mail::button', ['url' => route('stores.show', $store)])
        View Products
    @endcomponent
@endcomponent
