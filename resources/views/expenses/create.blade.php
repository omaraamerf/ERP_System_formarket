<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Expense</title>
</head>
<body>
    <div class="container mt-5">
    <h1>Create New Expense</h1>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <label class="form-label" for="description">Description:</label>
        <input class="form-control" type="text" name="description" id="description" required>
        <br>
        <label class="form-label" for="amount">Amount:</label>
        <input class="form-control" type="number" name="amount" id="amount" step="0.01" required>
        <br>
        <label class="form-label" for="category">Category:</label>
        <input class="form-control" type="text" name="category" id="category" required>
        <br>
        <button class="btn btn-primary" type="submit">Create Expense</button>
    </form>
    </div>
</body>
</html>
