<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama</label><br>
    <input
        type="text"
        name="name"
        value="{{ old('name', $product->name) }}"
    >
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="description">{{ old('description', $product->description) }}</textarea>
    <br><br>

    <label>Harga</label><br>
    <input
        type="number"
        name="price"
        value="{{ old('price', $product->price) }}"
    >
    <br><br>

    <label>Stock</label><br>
    <input
        type="number"
        name="stock"
        value="{{ old('stock', $product->stock) }}"
    >
    <br><br>

    <button type="submit">Update</button>
</form>

<br>

<a href="{{ route('products.index') }}">Kembali</a>

</body>
</html>
