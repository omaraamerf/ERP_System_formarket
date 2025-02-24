<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Expense Details</title>
</head>
<body>
    <div class="container mt-5">
    <h1>Expense Details</h1>
    <p><strong>ID:</strong> {{ $expense->id }}</p>
    <p><strong>Description:</strong> {{ $expense->description }}</p>
    <p><strong>Amount:</strong> {{ $expense->amount }}</p>
    <p><strong>Category:</strong> {{ $expense->category }}</p>
    <a class="btn btn-primary" href="{{ route('expenses.index') }}">Back to List</a>
    </div>
</body>
</html>
