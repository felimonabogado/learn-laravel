<x-layout>
    <a href="{{ route('products.index') }}">Back to Products</a>

    <h1>{{ $product->name }}</h1>
    
    <div>{{ $product->description }}</div>
    <p>Size: {{ $product->size }}</p>
    <a href="{{ route('products.edit', $product->id) }}">Edit Product</a>
   
    <form action="{{ route('products.destroy', $product) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</x-layout>