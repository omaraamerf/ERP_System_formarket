<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PurchaseInvoice;
use App\Models\Supplier;

class PurchaseInvoiceController extends Controller {
    public function create() {
        $suppliers = Supplier::all();
        return view('purchase_invoices.create', compact('suppliers'));
    }
    public function store(Request $request) {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'total_amount' => 'required|numeric',
            'invoice_date' => 'required|date',
        ]);
        PurchaseInvoice::create($request->all());
        return redirect()->route('accountant.financial_data');
    }
}
