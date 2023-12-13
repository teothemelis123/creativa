<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{   
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
        ]);

        // Handle logo update
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->update(['logo' => $logoPath]);
        }

        return redirect()->route('dashboard')->with('success', 'Company updated successfully!');
    }


    
    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->update(['logo' => $logoPath]);
        }

        return redirect()->route('dashboard')->with('success', 'Company created successfully!');
        


    }

    public function destroy($id)
{
    $company = Company::findOrFail($id);
    $company->delete();

    return redirect()->route('dashboard')->with('success', 'Company deleted successfully!');
}

public function index()
{
    $companies = Company::paginate(10);

    return view('dashboard', compact('companies'));
}


public function show(Company $company)
{
    return view('companies.show', compact('company'));
}

}
?>
