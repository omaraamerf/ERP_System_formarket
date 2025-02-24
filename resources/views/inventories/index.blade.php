<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inventories</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Inventories List</h1>

        <a href="{{ route('inventories.create') }}" class="btn btn-success mb-3">Create Inventory</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Goods</th>
                    <th>Location</th>
                    <th>stock_available</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->goods->name }}</td>
                        <td>{{ $inventory->location }}</td>
                        <td>{{$inventory->stock_available}}</td>
                        <td>
                            <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
