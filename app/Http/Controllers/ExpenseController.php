<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    /**
     *
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $expenses = Expense::all();


        return view('expenses.index', compact('expenses'));
    }

    /**
     *
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       
        return view('expenses.create');
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);


        Expense::create($request->all());


        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $expense = Expense::findOrFail($id);


        return view('expenses.show', compact('expense'));
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $expense = Expense::findOrFail($id);


        return view('expenses.edit', compact('expense'));
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);


        $expense = Expense::findOrFail($id);


        $expense->update($request->all());


        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $expense = Expense::findOrFail($id);


        $expense->delete();


        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
