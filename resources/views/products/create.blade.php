<x-layout title="Products - Create">
    <div class="container">
        <h1>
            Create Product
        </h1>
    </div>
    <x-products.form :action="route('products.store')" :name="old('name')" :description="old('description')" :price="old('price')" :quantity="old('quantity')" :update="false" :store="$store" />
</x-layout>
