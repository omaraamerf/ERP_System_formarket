<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Employee</title>
</head>
<body>
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
        @method('PUT')
        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $employee->name }}" required>
        <br>
        <label class="form-label" for="role_id">Role:</label>
        <select name="role_id" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $employee->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label class="form-label" for="salary">Salary:</label>
        <input class="form-control" type="number" name="salary" id="salary" step="0.01" value="{{ $employee->salary }}" required>
        <br>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
    </div>
</body>
</html>
