<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>إنشاء دفعة مورد</title>
</head>
<body>
    <div class="container mt-5">
        <h1>إنشاء دفعة مورد</h1>
        <form action="{{ route('supplier_payments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="supplier_id" class="form-label">المورد</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">المبلغ</label>
                <input type="number" name="amount" id="amount" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="payment_date" class="form-label">تاريخ الدفعة</label>
                <input type="date" name="payment_date" id="payment_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">حفظ الدفعة</button>
        </form>
    </div>
</body>
</html>
