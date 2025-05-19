<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use App\Models\category_expense;
use App\Models\branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the expenses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = \App\Models\expenses::with(['category_expense', 'branch'])->get();
        return view('page.expenses-list', compact('expenses'));
    }

    /**
     * Show the form for creating a new expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category_expense::all();
        $branches = branch::all();
        return view('page.new-expenses', compact('categories', 'branches'));
    }

    /**
     * Store a newly created expense in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expense_name' => 'required|string|max:255',
            'category_expense_id' => 'required|exists:category_expenses,category_expense_id',
            'date_expense' => 'required|string',
            'expense_cost' => 'required|numeric',
            'payment_status' => 'required|string|in:Paid,Pending,Overdue',
            'invoice_number' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'branch_code' => 'required|exists:branches,branch_code',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle date format - extract the first date if it's a range
        $dateExpense = $request->date_expense;
        if (strpos($dateExpense, ' to ') !== false) {
            $dateExpense = explode(' to ', $dateExpense)[0];
        }

        // Create the expense with the modified date
        $expense = new expenses();
        $expense->expense_name = $request->expense_name;
        $expense->category_expense_id = $request->category_expense_id;
        $expense->date_expense = $dateExpense;
        $expense->expense_cost = $request->expense_cost;
        $expense->payment_status = $request->payment_status;
        $expense->invoice_number = $request->invoice_number;
        $expense->remarks = $request->remarks;
        $expense->branch_code = $request->branch_code;
        $expense->save();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense created successfully');
    }

    /**
     * Display the specified expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = expenses::with(['category_expense', 'branch'])->findOrFail($id);
        return view('page.expenses-detail', compact('expense'));
    }

    /**
     * Show the form for editing the specified expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = expenses::findOrFail($id);
        $categories = category_expense::all();
        $branches = branch::all();
        return view('page.edit-expenses', compact('expense', 'categories', 'branches'));
    }

    /**
     * Update the specified expense in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'expense_name' => 'required|string|max:255',
            'category_expense_id' => 'required|exists:category_expenses,category_expense_id',
            'date_expense' => 'required|string',
            'expense_cost' => 'required|numeric',
            'payment_status' => 'required|string|in:Paid,Pending,Overdue',
            'invoice_number' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
            'branch_code' => 'required|exists:branches,branch_code',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $expense = expenses::findOrFail($id);
        
        // Handle date format - extract the first date if it's a range
        $dateExpense = $request->date_expense;
        if (strpos($dateExpense, ' to ') !== false) {
            $dateExpense = explode(' to ', $dateExpense)[0];
        }
        
        $expense->expense_name = $request->expense_name;
        $expense->category_expense_id = $request->category_expense_id;
        $expense->date_expense = $dateExpense;
        $expense->expense_cost = $request->expense_cost;
        $expense->payment_status = $request->payment_status;
        $expense->invoice_number = $request->invoice_number;
        $expense->remarks = $request->remarks;
        $expense->branch_code = $request->branch_code;
        $expense->save();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = expenses::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully');
    }
}