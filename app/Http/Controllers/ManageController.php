<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income_category;
use App\Expense_category;
use App\Loaner;
use App\Basic;
use App\LoanReceived;
use App\LoanPaid;
use App\LoanGiven;
use App\LoanPayment;
class ManageController extends Controller{
  public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $allincate=Income_category::where('incate_status','1')->count();
        $allexpcate=Expense_category::where('expcate_status','1')->count();
        $loaner=Loaner::where('loaner_status','1')->count();
        $basic=Basic::where('basic_status','1')->count();
        $totalRec=LoanReceived::where('loan_rec_status','1')->sum('loan_rec_amount');
        $totalPaid=LoanPaid::where('loan_paid_status','1')->sum('loan_paid_amount');
        $totalGiven=LoanGiven::where('loan_given_status','1')->sum('loan_given_amount');
        $totalPayment=LoanPayment::where('loan_payment_status','1')->sum('loan_payment_amount');

        return view('manage.index',compact('basic','allincate','allexpcate','loaner','totalRec','totalPaid','totalGiven','totalPayment'));
    }
}
