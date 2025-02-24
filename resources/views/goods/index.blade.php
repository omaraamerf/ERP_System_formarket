<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        <h1>Goods List</h1>
        <table class="table table-bordered">
            <thead class="table-group-divider">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Supplier</th>
                    <th>Stock Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($goods as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $item->stock_level }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('goods.show', $item->id) }}">View</a>
                            <a class="btn btn-primary" href="{{ route('goods.edit', $item->id) }}">Edit</a>
                            <form action="{{ route('goods.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('goods.create') }}'">Create</button>
    </div>
</body>
</html>
