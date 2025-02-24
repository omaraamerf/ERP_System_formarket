<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Sale</title>
</head>
<body>
    <div class="container">
    <h1>Edit Sale</h1>
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label class="form-label" for="goods_id">Goods:</label>
        <select name="goods_id" id="goods_id" required>
            @foreach ($goods as $good)
                <option value="{{ $good->id }}" {{ $sale->goods_id == $good->id ? 'selected' : '' }}>{{ $good->name }}</option>
            @endforeach
        </select>
        <br>
        <label class="form-label" for="employee_id">Employee:</label>
        <select name="employee_id" id="employee_id" required>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ $sale->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
            @endforeach
        </select>
        <br>
        <label class="form-label" for="quantity">Quantity:</label>
        <input class="form-control" type="number" name="quantity" id="quantity" value="{{ $sale->quantity }}" required>
        <br>

        <button class="btn btn-primary" type="submit">Update Sale</button>
    </form>
    </div>
</body>
</html>
