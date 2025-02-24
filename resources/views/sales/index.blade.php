<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sales List</title>
</head>
<body>
    <div class="container mt-5">
    <h1>Sales List</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Goods</th>
                <th>Employee</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->goods->name }}</td>
                    <td>{{ $sale->employee->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_price }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('sales.show', $sale->id) }}">View</a>
                        <a class="btn btn-warning" href="{{ route('sales.edit', $sale->id) }}">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('sales.create') }}'">Create</button>
    </div>
</body>
</html>
