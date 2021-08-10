<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expense.index', compact('expenses'));
    }

    public function create()
    {
        return view('expense.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'title'         => 'required',
        'amount'        => 'required'
        ]);
        Expense::create([
            'title'     => $request->title,
            'details'   => $request->details,
            'amount'    => $request->amount,
            'date'      => $request->date,
            'month'     => $request->month,
            'year'      => $request->year
        ]);
        $notification  = [
            'message'=>'Expense Created Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('expense.index')->with($notification);
    }

    public function show(Expense $expense)
    {
        //
    }

    public function edit(Expense $expense)
    {
        return view('expense.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'amount'        => 'required'
        ]);
        Expense::where('id', $id)->update([
            'title'     => $request->title,
            'details'   => $request->details,
            'amount'    => $request->amount,
            'date'      => $request->date,
            'month'     => $request->month,
            'year'      => $request->year
        ]);
        $notification  = [
            'message'=>'Expense Updated Successfully!',
            'alert-type'=> 'success'
        ];
        return redirect()->route('expense.index')->with($notification);
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        $notification  = [
        'message'=>'Expense Deleted Successfully!',
        'alert-type'=> 'success'
        ];
        return redirect()->route('expense.index')->with($notification);
    }


    public function todayExpense(){
        $date = date("d-m-y");
        $todays = Expense::where('date', $date)->get();
        $today_Sum = Expense::where('date', $date)->sum('amount');
        return view('expense.indexToday', compact('todays', 'today_Sum'));
    }

    public function monthlyExpense(){
        $month = date("F");
        $months = Expense::where('month', $month)->get();
        $months_Sum = Expense::where('month', $month)->sum('amount');
        return view('expense.indexMonth', compact('month', 'months', 'months_Sum'));
    }
    public function monthwiseExpense($month){
        $months = Expense::where('month', $month)->get();
        $months_Sum = Expense::where('month', $month)->sum('amount');
        return view('expense.indexMonth', compact('month', 'months', 'months_Sum'));
    }

    public function yearlyExpense(){
        $year = date("Y");
        $years = Expense::where('year', $year)->get();
        $years_Sum = Expense::where('year', $year)->sum('amount');
        return view('expense.indexYear', compact('year', 'years', 'years_Sum'));
    }
}
