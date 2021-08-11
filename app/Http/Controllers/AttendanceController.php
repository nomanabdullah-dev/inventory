<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::get();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $date = $request->att_date;
        $att = Attendance::where('att_date', $date)->first();
        if($att){
            $notification  = [
                'message'=>'Oops! Already taken for this day.',
                'alert-type'=> 'error'
            ];
            return redirect()->back()->with($notification);
        }else {
            $data= [];
            foreach($request->employee_id as $id){
                $data[] = [
                    "employee_id"   => $id,
                    "attendance"    => $request->attendance[$id],
                    "att_date"      => $request->att_date,
                    "att_year"      => $request->att_year,
                    "att_edit"      => date("d_m_y"),
                ];
            }
            $attendance = DB::table('attendances')->insert($data);
            if($attendance){
                $notification  = [
                    'message'=>'Attendance Taken Successfully!',
                    'alert-type'=> 'success'
                ];
                return redirect()->route('attendance.index')->with($notification);
            }
        }
    }

    public function show(Attendance $salary)
    {
        //
    }

    public function edit($att_edit)
    {
        $att = Attendance::where('att_edit', $att_edit)->get();
        $all = Attendance::get();
        $employees = Employee::all();
        return view('attendance.edit', compact('att', 'employees', 'all'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id'       => 'required',
            'att_date'          => 'required',
            'att_year'          => 'required',
            'attendance'        => 'required',
        ]);
        $data=array();
        $data['employee_id'] = $request->employee_id;
        $data['att_date']    = $request->month;
        $data['att_year' ]   = $request->year;
        $data['attendance']  = $request->advanced_salary;

        Attendance::where('id', $id)->update($data);
        $notification  = [
            'message'=>'Advanced Updated Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('attendance.index')->with($notification);
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        $notification  = [
        'message'=>'Attendance Deleted Successfully!',
        'alert-type'=> 'success'
        ];
        return redirect()->route('attendance.index')->with($notification);
    }
}
