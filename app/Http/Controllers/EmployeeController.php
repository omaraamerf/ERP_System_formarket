<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $roles = Role::all(); // Retrieve all roles
        return view('employees.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|string|max:15',
            'role_id' => 'required|exists:roles,id',
            'salary' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'salary' => $request->salary,
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'employee_id' => $employee->id,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee and User created successfully.');
    }


    public function show($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }
        return view('employees.show', compact('employee'));
    }


    public function edit($id)
    {
        $employee = Employee::find($id);
        $roles = Role::all();

        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        return view('employees.edit', compact('employee', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        $request->validate([
            'name' => 'sometimes|string',
            'role' => 'sometimes|string',
            'salary' => 'sometimes|numeric|min:0',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (!$employee) {
            return redirect()->route('employees.index')->with('error', 'Employee not found.');
        }

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
