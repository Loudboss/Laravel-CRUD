<!-- resources/views/products/index.blade.php -->
@include('products.header')

<div class=" flex justify-center w-full h-screen">
    <div class=" text-base pt-10">
        <h1 class=" text-2xl text-center mb-5 font-bold">Product List</h1>

@if(session('success'))
  <div class="bg-green-500 text-green-100 p-2">{{ session('success') }}</div>
@endif

<div class=" w-full text-center my-3">
    <a href="{{ route('products.create') }}" class=" px-4 py-2 bg-green-500 text-white">Add New Product</a>
</div>

   <table class="w-full text-sm text-left text-gray-700 shadow">
    <thead class="text-xs text-white uppercase bg-gray-700 ">
        <tr>
            <th class="px-6 py-3 rounded-tl-lg">ID</th>
            <th class="px-6 py-3 ">Name</th>
            <th class="px-6 py-3 ">Quantity</th>
            <th class="px-6 py-3 ">Price</th>
            <th class="px-6 py-3 ">Supplier</th>
            <th class="px-6 py-3 rounded-tr-lg">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="px-6 py-4 ">{{ $product->id }}</td>
            <td class="px-6 py-4 ">{{ $product->name }}</td>
            <td class="px-6 py-4 ">{{ $product->qty }}</td>
            <td class="px-6 py-4 ">{{ $product->price }}</td>
            <td class="px-6 py-4 ">{{ $product->supplier }}</td>
            <td class="px-6 py-4 ">
                <a href="{{ route('products.show', $product->id) }}" class="px-4 py-2 bg-sky-500 text-white">View</a>
                <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 bg-yellow-500 text-white">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>

</div>
</body>
</html>