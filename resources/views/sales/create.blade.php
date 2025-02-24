<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Sale</title>
</head>
<body>
    <div class="container">
        <h1>Create New Sale</h1>
        <form class="form" action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="mb-3">
            <label class="form-label" for="goods_id">Goods:</label>
            <select name="goods_id" id="goods_id" required>
            @foreach ($goods as $good)
                <option value="{{ $good->id }}">{{ $good->name }}</option>
            @endforeach

        </select>
        </div >
        <br>
        <label class="form-label" for="employee_id">Employee:</label>
        <select name="employee_id" id="employee_id" required>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        <br>
        <label class="form-label" for="quantity">Quantity:</label>
        <input class="form-control" type="number" name="quantity" id="quantity" required>
        <br>

        <button type="submit" class="btn btn-primary">Create Sale</button>
    </form>
    </div>
</body>
</html>
