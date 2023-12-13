<?php 

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;

class DashboardController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $companies = Company::all();
        
        return view('dashboard', compact('employees', 'companies'));
    }
}