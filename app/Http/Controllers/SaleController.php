<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Goods;
use App\Models\Employee;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::with('goods', 'employee')->get();


        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $goods = Goods::all();
        $employees = Employee::all();

        return view('sales.create', compact('goods', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'employee_id' => 'required|exists:employees,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $goods = Goods::findOrFail($request->goods_id);
        $totalPrice = $request->quantity * $goods->price;

        $sale = Sale::create([
            'goods_id' => $request->goods_id,
            'employee_id' => $request->employee_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
    }
    public function printInvoice($id)
    {
        $sale = Sale::findOrFail($id);
        return view('invoices.invoice', compact('sale'));
    }

    public function show($id)
    {
        $sale = Sale::findOrFail($id);

        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);

        $goods = Goods::all();
        $employees = Employee::all();

        return view('sales.edit', compact('sale', 'goods', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $sale = Sale::findOrFail($id);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
