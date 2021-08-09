<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'name'      => 'required',
        'email'     => 'required|unique:employees',
        'phone'     => 'required|max:13',
        'address'   => 'required',
        'experience'=> 'required',
        'photo'     => 'required|mimes:jpg,jpeg,png|max:2048',
        'nid'       => 'required|unique:employees',
        'salary'    => 'required',
        'vacation'  => 'required',
        'city'      => 'required'
        ]);
        $data=array();
        $data['name']      = $request->name;
        $data['email']     = $request->email;
        $data['phone' ]    = $request->phone;
        $data['address']   = $request->address;
        $data['experience']= $request->experience;
        $data['nid']       = $request->nid;
        $data['salary']    = $request->salary;
        $data['vacation']  = $request->vacation;
        $data['city']      = $request->city;
        $image             = $request->file('photo');

        $ext               = strtolower($image->getClientOriginalExtension());
        $path              = 'images/employee/';
        $img_name          = time().'-'.rand(100,999).'.'.$ext;
        $img_url           = $path.$img_name;
        $moved             = $image->move($path,$img_name);
        if($moved) {
            $data['photo'] = $img_url;
            Employee::create($data);
            $notification  = [
                'message'=>'Employee Created Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->route('employee.index')->with($notification);
        }
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name'      => 'required',
        'email'     => 'required',
        'phone'     => 'required|max:13',
        'address'   => 'required',
        'experience'=> 'required',
        'nid'       => 'required',
        'salary'    => 'required',
        'vacation'  => 'required',
        'city'      => 'required'
        ]);
        $data=array();
        $data['name']      = $request->name;
        $data['email']     = $request->email;
        $data['phone' ]    = $request->phone;
        $data['address']   = $request->address;
        $data['experience']= $request->experience;
        $data['nid']       = $request->nid;
        $data['salary']    = $request->salary;
        $data['vacation']  = $request->vacation;
        $data['city']      = $request->city;

        if($request->file('photo')) {
            $image             = $request->file('photo');
            $ext               = strtolower($image->getClientOriginalExtension());
            $path              = 'images/employee/';
            $img_name          = time().'-'.rand(100,999).'.'.$ext;
            $img_url           = $path.$img_name;
            $moved             = $image->move($path,$img_name);
            if($moved) {
                $data['photo'] = $img_url;
                $employee      = Employee::where('id', $id)->first();
                $old_photo     = $employee->photo;
                $old_photo_rmv = unlink($old_photo);
                if($old_photo_rmv) {
                    Employee::where('id', $id)->update($data);
                    $notification  = [
                        'message'=>'Employee Updated Successfully!',
                        'alert-type'=> 'success'
                    ];
                    return redirect()->route('employee.index')->with($notification);
                }
            }
        }else {
            Employee::where('id', $id)->update($data);
            $notification  = [
                'message'=>'Employee Updated Successfully!',
                'alert-type'=> 'success'
            ];
            return redirect()->route('employee.index')->with($notification);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $photo_unlink = unlink($employee->photo);
        if($photo_unlink) {
            $employee->delete();
            $notification  = [
            'message'=>'Employee Deleted Successfully!',
            'alert-type'=> 'success'
            ];
            return redirect()->route('employee.index')->with($notification);
        }else {
            $notification  = [
                'message'=>'Something goes wrong!',
                'alert-type'=> 'error'
            ];
            return redirect()->route('employee.index')->with($notification);
        }
    }
}
