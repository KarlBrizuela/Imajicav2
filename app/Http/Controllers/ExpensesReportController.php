<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\expenses;
use App\Models\category_expense;
use Carbon\Carbon;

class ExpensesReportController extends Controller
{
    public function index()
    {
        // Get overall metrics
        $totalExpenses = expenses::sum('expense_cost');
        
        // Get highest expense category
        $highestCategory = category_expense::select('category_expenses.name')
            ->join('expenses', 'category_expenses.category_expense_id', '=', 'expenses.category_expense_id')
            ->groupBy('category_expenses.category_expense_id', 'category_expenses.name')
            ->orderByRaw('SUM(expenses.expense_cost) DESC')
            ->first();
            
        $highestCategoryName = $highestCategory ? $highestCategory->name : 'N/A';
        
        // Get expense transactions for the table
        $expenses = expenses::with(['category_expense', 'branch'])
            ->orderBy('date_expense', 'desc')
            ->get();
        
        // Get monthly expense data for the last 6 months
        $monthlyData = $this->getMonthlyExpenses();
        
        // Get expense breakdown by category
        $categoryBreakdown = $this->getCategoryBreakdown();
        
        return view('page.expenses-report', compact(
            'totalExpenses',
            'highestCategoryName',
            'expenses',
            'monthlyData',
            'categoryBreakdown'
        ));
    }
    
    /**
     * Get monthly expenses for the last 6 months
     * 
     * @return array
     */
    private function getMonthlyExpenses()
    {
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(5);
        
        $monthlyExpenses = DB::table('expenses')
            ->select(DB::raw('YEAR(date_expense) as year, MONTH(date_expense) as month, SUM(expense_cost) as total'))
            ->whereBetween('date_expense', [$startDate->format('Y-m-d'), $endDate->format('Y-m-d')])
            ->groupBy(DB::raw('YEAR(date_expense), MONTH(date_expense)'))
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        
        $labels = [];
        $data = [];
        
        // Create array with all months (even empty ones)
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $yearMonth = $currentDate->format('Y-m');
            $labels[] = $currentDate->format('M');
            $data[$yearMonth] = 0;
            $currentDate->addMonth();
        }
        
        // Fill in actual data
        foreach ($monthlyExpenses as $expense) {
            $yearMonth = sprintf('%04d-%02d', $expense->year, $expense->month);
            if (isset($data[$yearMonth])) {
                $data[$yearMonth] = $expense->total;
            }
        }
        
        return [
            'labels' => $labels,
            'values' => array_values($data)
        ];
    }
    
    /**
     * Get expense breakdown by category
     * 
     * @return array
     */
    private function getCategoryBreakdown()
    {
        $categories = DB::table('expenses')
            ->join('category_expenses', 'expenses.category_expense_id', '=', 'category_expenses.category_expense_id')
            ->select('category_expenses.name', DB::raw('SUM(expenses.expense_cost) as total'))
            ->groupBy('category_expenses.name')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();
        
        $labels = [];
        $data = [];
        $colors = [
            '#4db6ac', '#ff9800', '#f44336', '#9c27b0', '#3f51b5',
            '#2196f3', '#009688', '#8bc34a', '#ffc107', '#795548'
        ];
        
        foreach ($categories as $index => $category) {
            $labels[] = $category->name;
            $data[] = $category->total;
        }
        
        return [
            'labels' => $labels,
            'values' => $data,
            'colors' => array_slice($colors, 0, count($labels))
        ];
    }
} 