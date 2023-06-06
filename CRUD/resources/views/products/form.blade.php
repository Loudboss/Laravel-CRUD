<!-- resources/views/products/form.blade.php -->

<div class=" flex justify-center w-full py-10">
<div class=" text-base w-5/12 border-solid border-gray-700 border-2 p-5">
<h1 class=" text-2xl text-center  font-bold mb-5">{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>

<form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name">Name:    </label>
        <input type="text" name="name" id="name" class="w-full p-2 border-2 border-gray-700" value="{{ isset($product) ? $product->name : old('name') }}" >
        @error('name')
        <div class="bg-red-700 text-red-200 p-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="quantity">Quantity:</label>
        <input type="number" name="qty" id="quantity" class="w-full p-2 border-2 border-gray-700" value="{{ isset($product) ? $product->qty : old('quantity') }}" >
        @error('qty')
        <div class="bg-red-700 text-red-200 p-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" class="w-full p-2 border-2 border-gray-700" value="{{ isset($product) ? $product->price : old('price') }}" >
        @error('price')
        <div class="bg-red-700 text-red-200 p-1">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="supplier">Supplier:</label>
        <input type="text" name="supplier" id="supplier" class="w-full p-2 border-2 border-gray-700" value="{{ isset($product) ? $product->supplier : old('supplier') }}" >
        @error('supplier')
        <div class="bg-red-700 text-red-200 p-1">{{ $message }}</div>
        @enderror
    </div>

    <div class=" flex justify-center gap-3">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
        <button class="px-4 py-2 bg-gray-700 text-white"><a href="{{ route('products.index') }}">cancel</a></button>
    </div>
</form>

</div>

</div>