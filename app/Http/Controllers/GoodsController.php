<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Supplier;
use Illuminate\Http\Request;

class GoodsController extends Controller
{

    public function index()
    {
        $goods = Goods::with('supplier')->get();
        return view('goods.index', compact('goods'));
    }


    public function create()
    {
        $suppliers = Supplier::all();
        return view('goods.create', compact('suppliers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'stock_level' => 'required|integer',
        ]);

        Goods::create($request->all());
        return redirect()->route('goods.index')->with('success', 'Product created successfully.');
    }


    public function show($id)
    {
        $goods = Goods::with('supplier')->find($id);
        if (!$goods) {
            return redirect()->route('goods.index')->with('error', 'Product not found.');
        }
        return view('goods.show', compact('goods'));
    }


    public function edit($id)
    {
        $goods = Goods::find($id);
        $suppliers = Supplier::all();
        if (!$goods) {
            return redirect()->route('goods.index')->with('error', 'Product not found.');
        }
        return view('goods.edit', compact('goods', 'suppliers'));
    }


    public function update(Request $request, $id)
    {
        $goods = Goods::find($id);
        if (!$goods) {
            return redirect()->route('goods.index')->with('error', 'Product not found.');
        }

        $request->validate([
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'supplier_id' => 'sometimes|exists:suppliers,id',
            'stock_level' => 'sometimes|integer',
        ]);

        $goods->update($request->all());
        return redirect()->route('goods.index')->with('success', 'Product updated successfully.');
    }

    
    public function destroy($id)
    {
        $goods = Goods::find($id);
        if (!$goods) {
            return redirect()->route('goods.index')->with('error', 'Product not found.');
        }

        $goods->delete();
        return redirect()->route('goods.index')->with('success', 'Product deleted successfully.');
    }
}
