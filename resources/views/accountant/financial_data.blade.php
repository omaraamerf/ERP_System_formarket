<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Financial Data</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Financial Data</h1>
        {{-- <button id="printInvoiceBtn" onclick="window.location.href='{{ route('inventories') }} class="btn btn-primary">Print Invoice</button> --}}

        <h2>Employees and Salaries</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->role->name }}</td>
                        <td>{{ $employee->salary }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align: right;">Total Salaries</td>
                    <td>{{ $totalSalaries }}</td>
                </tr>
            </tfoot>
        </table>

        <h2>Sales Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sale ID</th>
                    <th>Employee</th>
                    <th>Good</th>
                    <th>total  price</th>
                    <th>Sale Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->employee->name }}</td>
                    <td>{{ $sale->goods->name }}</td>
                    <td>{{ $sale->total_price }}</td>
                    <td>{{ $sale->sale_date }}</td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: right;">Total Quantity Sold</td>
                    <td>{{ $totalSales }}</td>
                </tr>
            </tfoot>
        </table>

        <h2>Purchase Invoices</h2>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Supplier</th>
                    <th>Amount Due</th>
                    <th>Invoice Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchaseInvoices as $invoice) <!-- تغيير المتغير إلى purchaseInvoices -->
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->supplier->name }}</td>
                        <td>{{ number_format($invoice->total_amount, 2) }}$</td>
                        <td>{{ $invoice->invoice_date }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end">Total Amount Due</td>
                    <td>{{ number_format($totalDue, 2) }}$</td>
                </tr>
                
            </tfoot>
        </table>
    </div>
</body>
</html>
