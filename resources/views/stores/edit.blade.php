<x-layout title="Stores - Edit">
    <x-stores.form :action="route('stores.update', $store->id)" :name="$store->name" :description="$store->description" :address="$store->address" :update="true"/>
</x-layout>
