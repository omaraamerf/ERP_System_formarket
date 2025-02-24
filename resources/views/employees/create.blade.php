<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Employee</title>
</head>
<body>
    <div class="container">
        <h1>Create New Employee</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <label class="form-label" for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required>
            <br>
            <label for="role_id">Role:</label>
            <select name="role_id" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
            <br>
            <label class="form-label" for="salary">Salary:</label>
            <input class="form-control" type="number" name="salary" id="salary" step="0.01" required>
            <br>
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
            <br>
            <label class="form-label" for="phone">Phone:</label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
            <br>
            <label class="form-label" for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <br>

            <label class="form-label" for="password_confirmation">Confirm Password:</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
            <br>
            <button type="submit" class="btn btn-primary">Create Employee</button>
        </form>
    </div>
</body>
</html>
