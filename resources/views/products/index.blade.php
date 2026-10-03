<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h1>Product List</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('products.create') }}">Tambah Product</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('products.show', $product) }}">
                        Detail
                    </a>

                    <a href="{{ route('products.edit', $product) }}">
                        Edit
                    </a>

                    <form
                        action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        style="display:inline"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada product.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
