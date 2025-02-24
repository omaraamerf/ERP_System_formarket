<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sale Details</title>
</head>
<body>
    <div class="container">
    <h1>Sale Details</h1>
    <p><strong>ID:</strong> {{ $sale->id }}</p>
    <p><strong>Goods:</strong> {{ $sale->goods->name }}</p>
    <p><strong>Employee:</strong> {{ $sale->employee->name }}</p>
    <p><strong>Quantity:</strong> {{ $sale->quantity }}</p>
    <p><strong>Total Price:</strong> {{ $sale->total_price }}</p>

    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('sales.index') }}'">Back to List</button>
    </div>
</body>
</html>
