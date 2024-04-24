<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        Company::create([
            'name' => $request->name,
            'website' => $request->website,
            'email' => $request->email,
            'logo' => Controller::image( $request->logo, 'company' )
        ]);
        return back()->with('success','Company Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyStoreRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->name,
            'website' => $request->website,
            'email' => $request->email,
        ]);
        if ($request->hasFile('logo')) {
            $company->update([
                'logo' =>  Controller::image( $request->logo, 'company', true, $company->logo )
            ]);            
        }
        return back()->with('success','Company Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with('danger','Company Deleted Successfully !!!');
    }
}
