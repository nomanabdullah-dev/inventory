<?php

namespace App\Http\Controllers;

use App\Models\AdvancedSalary;
use App\Models\Employee;
use Illuminate\Http\Request;

class AdvancedSalaryController extends Controller
{
    public function index()
    {
        $adsalaries = AdvancedSalary::all();
        $employee = Employee::all();
        return view('advancedsalary.index', compact('adsalaries', 'employee'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('advancedsalary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'employee_id'       => 'required',
        'month'             => 'required',
        'year'              => 'required',
        'advanced_salary'   => 'required',
        ]);
        $data=array();
        $data['employee_id']    = $request->employee_id;
        $data['month']          = $request->month;
        $data['year' ]          = $request->year;
        $data['advanced_salary']= $request->advanced_salary;

        AdvancedSalary::create($data);
        $notification  = [
            'message'=>'Advanced Salary Created Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('advancedsalary.index')->with($notification);
    }

    public function show(AdvancedSalary $salary)
    {
        //
    }

    public function edit($id)
    {
        $adsalary = AdvancedSalary::findOrFail($id);
        $employees = Employee::all();
        return view('advancedsalary.edit', compact('adsalary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'employee_id'       => 'required',
        'month'             => 'required',
        'year'              => 'required',
        'advanced_salary'   => 'required',
        ]);
        $data=array();
        $data['employee_id']    = $request->employee_id;
        $data['month']          = $request->month;
        $data['year' ]          = $request->year;
        $data['advanced_salary']= $request->advanced_salary;

        AdvancedSalary::where('id', $id)->update($data);
        $notification  = [
            'message'=>'Advanced Salary Updated Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('advancedsalary.index')->with($notification);
    }

    public function destroy($id)
    {
        $adsalary = AdvancedSalary::findOrFail($id);
        $adsalary->delete();
        $notification  = [
        'message'=>'Advanced Salary Deleted Successfully!',
        'alert-type'=> 'success'
        ];
        return redirect()->route('advancedsalary.index')->with($notification);
    }
}
