<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Expenses List</title>
</head>
<body>
    <div class="container mt-5">
    <h1>Expenses List</h1>
    
    <table  class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->description }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->category }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('expenses.show', $expense->id) }}">View</a>
                        <a class="btn btn-primary" href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('expenses.create') }}'">Create</button>
    </div>
</body>
</html>
