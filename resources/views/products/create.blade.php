<!DOCTYPE html>
<html>
<head>
    <title>Tambah Product</title>
</head>
<body>

<h1>Tambah Product</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name') }}">
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="description">{{ old('description') }}</textarea>
    <br><br>

    <label>Harga</label><br>
    <input type="number" name="price" value="{{ old('price') }}">
    <br><br>

    <label>Stock</label><br>
    <input type="number" name="stock" value="{{ old('stock') }}">
    <br><br>

    <button type="submit">Simpan</button>
</form>

<br>

<a href="{{ route('products.index') }}">Kembali</a>

</body>
</html>
