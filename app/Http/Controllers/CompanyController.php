<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('dashboard', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('CompanyAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Name' =>'required',
            'email' =>'required|email|unique:companies,email',
            'website' =>'required|url'
        ]);
        $company = new Company();
        $company->Name = $request->Name;
        $company->email = $request->email;
        $company->website = $request->website;
        if($request->logo==null)
          {
            $company->logo= "";

          }
          else
          {
            $file_name = time().".".$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path('logo'),$file_name);
            $company->logo = $file_name;
          }
          $company->save();
          return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $company = Company::where('id','=',$request->id)->first();
        return view('CompanyEdit')->with('company',$company);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'Name' =>'required',
            'email' =>'required|unique:companies,email,'.$request->id,
            'website' =>'required|url'
        ]);
        //
        $company = Company::where('id','=',$request->id)->first();
        $company->Name = $request->Name;
        $company->email = $request->email;
        $company->website = $request->website;
        if($request->logo==null)
        {
          $company->logo = $company->logo;

        }
        else
        {
          $file_name = time().".".$request->file('logo')->getClientOriginalExtension();
          $request->file('logo')->move(public_path('logo'),$file_name);
          $company->logo = $file_name;
        }
        $company->save();
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $company = Company::where('id','=',$request->id)->first();
        $company->delete();
        return redirect()->route('dashboard');
    }
}
