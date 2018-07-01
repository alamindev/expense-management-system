<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Income;
use App\Expense;
use Carbon\Carbon;

class SummaryController extends Controller {
 public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $month= Carbon::now()->format('m');
        $fullMonth= Carbon::now()->format('F');
        $year= Carbon::now()->format('Y');
        $incomes =  Income::whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->get();
        $incomeTotal =  Income::whereMonth('income_date', '=', $month)->whereYear('income_date', '=', $year)->sum('income_amount');
        $expense =  Expense::whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->get();
        $expenseTotal =  Expense::whereMonth('expense_date', '=', $month)->whereYear('expense_date', '=', $year)->sum('expense_amount');
        return view('summary.all', compact('incomes','expense','incomeTotal','expenseTotal','fullMonth'));
    }

    public function archive(){
      echo Income::select('income_amount', 'income_date')
       ->get()
       ->groupBy(function($date) {
           return Carbon::parse($date->income_date)->format('Y-m'); // grouping by years
           //return Carbon::parse($date->created_at)->format('m'); // grouping by months
       });
    }

    public function search($from,$to){
       $income = Income::whereBetween('income_date', [$from, $to])->get();
       $expense = Expense::whereBetween('expense_date', [$from, $to])->get();
       $incomeTotal =  Income::whereBetween('income_date', [$from, $to])->sum('income_amount');
       $expenseTotal =  Expense::whereBetween('expense_date', [$from, $to])->sum('expense_amount');
       return view('summary.search', compact('from','to','income','expense','incomeTotal','expenseTotal'));
    }
}
