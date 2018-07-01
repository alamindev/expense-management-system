<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Charts;

class ReportController extends Controller {
 public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        $donut=Charts::create('donut', 'highcharts')
            ->title('November')
            ->labels(['Income', 'Expense', 'Saving'])
            ->values([50,40,10])
            ->responsive(true);
        
        $areaspline=Charts::multi('areaspline', 'highcharts')
            ->title('Last 7 Days')
            ->colors(['#ff0000', '#ffb3b3'])
            ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday', 'Sunday'])
            ->dataset('Income', [3, 4, 3, 5, 4, 10, 12])
            ->dataset('Expense',  [1, 3, 4, 3, 3, 5, 4]);
        
        return view('reports.barchart', compact("donut", "areaspline"));
    }
}
