<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeesController extends Controller
{
    public function create($id)
{
    $company = Company::findOrFail($id);
    return view('employees.create', ['company' => $company]);
}

    public function store(Request $request, $id)
    {   
        $company = Company::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ]);
        $request['phone'] = (string) $request->input('phone');
        
        Employee::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Employee created successfully for '.$company->name.'!');
    }

    

    public function edit($id)
{
    $employee = Employee::findOrFail($id);
    return view('employees.edit', ['employee' => $employee]);
}


public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'nullable|email',
        'phone' => 'nullable',
    ]);

    $request['phone'] = (string) $request->input('phone');

    $employee->update($request->all());

    return redirect()->route('dashboard')->with('success', 'Employee updated successfully!');
}
public function destroy($id)
{
    $employee = Employee::findOrFail($id);
    $employee->delete();

    return redirect()->route('dashboard')->with('success', 'Employee deleted successfully!');
}


public function show(Employee $employee)
    {
        // The $employee parameter is automatically resolved by Laravel's model binding.
        // It will retrieve the employee based on the {employee} parameter in the route.

        return view('employees.show', compact('employee'));
    }

}
