<x-layout title="Stores - Create">
    <div class="container">
        <h1>Create Store</h1>
    </div>
    <x-stores.form :action="route('stores.store')" :name="old('name')" :description="old('description')" :address="old('address')" :update="false"/>
</x-layout>
