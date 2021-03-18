<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=Expense::latest()->paginate();
        return view('expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cashinhand' => 'required|numeric',
            'incomeprice' => 'required|numeric',
            'incomedetails' => 'required',
            'expenseprice' => 'required|numeric',
            'expensedetails' => 'required',
            'details' => 'required',
            'resolution' => 'required',
        ]);
        $data = $request->all();
        Expense::create($data);
        return redirect()->back()->with('message', 'Details Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::find($id);
        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cashinhand' => 'required|numeric',
            'incomeprice' => 'required|numeric',
            'incomedetails' => 'required',
            'expenseprice' => 'required|numeric',
            'expensedetails' => 'required',
            'details' => 'required',
            'resolution' => 'required',
        ]);
        $expense = Expense::find($id);
        $data = $request->all();
        $expense->update($data);
        return redirect()->route('expense.index')->with('message', 'Expense has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->route('expense.index')->with('message', 'Expense has been deleted successfully');
    }
}
