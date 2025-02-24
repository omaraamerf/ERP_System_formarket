<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Accountant Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Accountant Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Financial Data</h5>
                        <a href="{{ route('accountant.financial_data') }}" class="btn btn-primary">View Financial Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
