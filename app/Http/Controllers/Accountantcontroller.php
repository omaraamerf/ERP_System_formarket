<?php



namespace App\Http\Controllers;
use App\Models\PurchaseInvoice;
use Illuminate\Http\Request;
use App\Models\Employee;

use App\Models\Sale;
use App\Models\financial_data;
use App\Models\SupplierPayment;
use App\Http\Controllers\PurchaseInvoiceController;
class AccountantController extends Controller
{
    public function index()
    {
        return view('accountant.dashboard');
    }

    public function financial_data()
    {

        $employees = Employee::with('role')->get();
        $totalSalaries = $employees->sum('salary');


        $sales = Sale::with(['employee', 'goods'])->get();
        $totalSales = $sales->sum('total_price');


        $purchaseInvoices = PurchaseInvoice::with(['supplier', 'goods'])->get();


        $totalDue = $purchaseInvoices->sum(function ($invoice) {
            return $invoice->goods->price * $invoice->goods->stock_level;
        });

        return view('accountant.financial_data', compact('employees', 'totalSalaries', 'sales', 'totalSales', 'purchaseInvoices', 'totalDue'));
    }


}

