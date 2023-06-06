<!-- resources/views/products/show.blade.php -->
@include('products.header')
<div class=" flex justify-center w-full pt-10">
    <div class=" text-base w-5/12 border-solid border-black border-2 p-5">
        <h1 class=" text-2xl text-center mb-5 font-bold">Product Details</h1>

        <p class=" mb-3"><strong>ID:</strong> {{ $product->id }}</p>
        <p class=" mb-3"><strong>Name:</strong> {{ $product->name }}</p>
        <p class=" mb-3"><strong>Quantiy:</strong> {{ $product->qty }}</p>
        <p class=" mb-3"><strong>Price:</strong> {{ $product->price }}</p>
        <p class=" mb-5"><strong>Supplier:</strong> {{ $product->supplier }}</p>

        <div class=" text-center">
            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-700 text-white">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>