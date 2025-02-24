<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Goods;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        $inventories = Inventory::with('goods')->get();
        return view('inventories.index', compact('inventories'));
    }

    public function create()
    {
        $goods = Goods::all();
        return view('inventories.create', compact('goods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'location' => 'required|string',
            'stock_available' => 'required|integer',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventories.index')->with('success', 'Inventory created successfully.');
    }

    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventories.show', compact('inventory'));
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        $goods = Goods::all();
        return view('inventories.edit', compact('inventory', 'goods'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'location' => 'required|string',
            'stock_available' => 'required|integer',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());
        return redirect()->route('inventories.index')->with('success', 'Inventory updated successfully.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Inventory deleted successfully.');
    }

}
