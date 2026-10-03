<!DOCTYPE html>
<html>
<head>
    <title>Detail Product</title>
</head>
<body>

<h1>Detail Product</h1>

<p>
    <strong>Nama:</strong>
    {{ $product->name }}
</p>

<p>
    <strong>Deskripsi:</strong>
    {{ $product->description }}
</p>

<p>
    <strong>Harga:</strong>
    Rp {{ number_format($product->price, 0, ',', '.') }}
</p>

<p>
    <strong>Stock:</strong>
    {{ $product->stock }}
</p>

<a href="{{ route('products.index') }}">Kembali</a>

</body>
</html>
