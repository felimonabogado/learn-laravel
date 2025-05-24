<x-layout>
    <h1>Products</h1>
    <a href="{{ route('products.create')}}">Add New Product</a>
    <div>
        @foreach ($products as $product)
            <div>
                <h2><a href="{{ route('products.show', $product->id)}}">{{ $product->name }}</a></h2>
                <div class="description">{{ $product->description }}</div>
                <div class="price">{{ $product->price }}</div>
            </div>
        @endforeach
    </div>
    {{ $products->links('vendor/pagination/simple-default') }}
</x-layout>