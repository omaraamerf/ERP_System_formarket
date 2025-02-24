<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee Details</title>
</head>
<body>
    <div class="container"> 
        <h1>Employee Details</h1>
        <p><strong>ID:</strong> {{ $employee->id }}</p>
        <p><strong>Name:</strong> {{ $employee->name }}</p>
        <p><strong>Role:</strong> {{ $employee->role }}</p>
        <p><strong>Salary:</strong> {{ $employee->salary }}</p>
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('employees.index') }}'">Back to List</button>
    </div>
</body>
</html>
