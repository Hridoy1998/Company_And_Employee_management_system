<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::with('company')->paginate(10);
        return view('Employeelist', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employee = Company::with('employees')->get();
        return view('EmployeeAdd')->with('employee', $employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'First_name'=>'required',
            'Last_name'=>'required',
            'email'=>'required|unique:employees,email',
            'Company'=>'required',
            'Phone_number'=>'required|unique:employees,Phone_number'
        ]);
        $employee = new Employee();
        $employee->First_name = $request->First_name;
        $employee->Last_name = $request->Last_name;
        $employee->email = $request->email;
        $employee->Phone_number = $request->Phone_number;
        $employee->Company = $request->Company;
        $employee->save();
        return redirect()->route('Employee.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $employee = Employee::where('id','=',$request->id)->first();
        $company = Company::all();
        return view('EmployeeEdit')->with('employee', $employee)->with('company',$company);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'First_name'=>'required',
            'Last_name'=>'required',
            'email'=>'required|unique:employees,email,'.$request->id,
            'Company'=>'required',
            'Phone_number'=>'required|unique:employees,Phone_number,'.$request->id
        ]);
        $employee = Employee::where('id','=',$request->id)->first();
        $employee->First_name = $request->First_name;
        $employee->Last_name = $request->Last_name;
        $employee->email = $request->email;
        $employee->Company = $request->Company;
        $employee->Phone_number = $request->Phone_number;
        $employee->save();
        return redirect()->route('Employee.list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $employee = Employee::where('id','=',$request->id)->first();
        $employee->delete();
        return redirect()->route('Employee.list');
    }
}
