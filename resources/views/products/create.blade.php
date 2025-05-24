<x-layout>
    <h1>Create Product</h1>
    <x-errors />
    <form action="{{ route ('products.store')}}" method="post">
        <x-products.form />
    </form>
</x-layout>