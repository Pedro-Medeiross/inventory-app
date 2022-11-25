<x-layout title="Products - Edit">
    <x-products.formEdit :action="route('products.update', $product->id)" :name="$product->name" :description="$product->description" :price="$product->price" :quantity="$product->quantity" :store="$store" :update="true"/>
</x-layout>
