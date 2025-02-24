<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $goods->name }}</h5>
                <p class="card-text">Price: ${{ $goods->price }}</p>
                <p class="card-text">Supplier: {{ $goods->supplier->name }}</p>
                <p class="card-text">Stock Level: {{ $goods->stock_level }}</p>
                <a href="{{ route('goods.edit', $goods->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('goods.destroy', $goods->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <a href="{{ route('goods.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</body>
</html>
