<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة المبيعات</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { direction: rtl; text-align: right; font-family: 'Arial', sans-serif; }
        .invoice-box { padding: 30px; border: 1px solid #eee; max-width: 800px; margin: auto; background: #f9f9f9; }
        .btn-print { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: center; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2 class="text-center">فاتورة مبيعات</h2>
        <p><strong>التاريخ:</strong> {{ now()->toDateString() }}</p>
        <p><strong>رقم الفاتورة:</strong> {{ $sale->id }}</p>
        <p><strong>اسم العميل:</strong> {{ $sale->employee->name }}</p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>المنتج</th>
                    <th>الكمية</th>
                    <th>السعر الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $sale->goods->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->total_price }}$</td>
                </tr>
            </tbody>
        </table>

        <h4 class="text-end">الإجمالي: {{ $sale->total_price }}$</h4>

        <button class="btn btn-primary btn-print" onclick="window.print()">طباعة الفاتورة</button>
    </div>
</body>
</html>
