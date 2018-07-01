<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaner;
use App\LoanReceived;
use App\LoanPaid;
use App\LoanGiven;
use App\LoanPayment;
use Carbon\Carbon;
use Session;

class LoanController extends Controller{
 public function __construct() {
        $this->middleware('auth');
    }

  public function index(){
    $loanrec=LoanReceived::where('loan_rec_status',1)->get();
    $loanpaid=LoanPaid::where('loan_paid_status',1)->get();
    $loangiven=LoanGiven::where('loan_given_status',1)->get();
    $loanpayment=LoanPayment::where('loan_payment_status',1)->get();
    $totalRec=LoanReceived::where('loan_rec_status',1)->sum('loan_rec_amount');
    $totalPaid=LoanPaid::where('loan_paid_status',1)->sum('loan_paid_amount');
    $totalGiven=LoanGiven::where('loan_given_status',1)->sum('loan_given_amount');
    $totalPayment=LoanPayment::where('loan_payment_status',1)->sum('loan_payment_amount');
    $totalCredit=$totalRec+$totalPayment;
    $totalDebit=$totalPaid+$totalGiven;
    return view('loan.all',compact('loanrec','loanpaid','loangiven','loanpayment','totalCredit','totalDebit'));
  }

  public function received(){
    $loanrec=LoanReceived::where('loan_rec_status',1)->get();
    return view('loan.all-receive',compact('loanrec'));
  }

  public function received_view(){
    
  }

  public function received_edit(){

  }

  public function received_softdelete(){

  }

  public function paid(){
    $loanpaid=LoanPaid::where('loan_paid_status',1)->get();
    return view('loan.all-paid',compact('loanpaid'));
  }

  public function given(){
    $loangiven=LoanGiven::where('loan_given_status',1)->get();
    return view('loan.all-given',compact('loangiven'));
  }

  public function payment(){
    $loanpayment=LoanPayment::where('loan_payment_status',1)->get();
    return view('loan.all-payment',compact('loanpayment'));
  }

  public function insert_received(Request $request){
      $loaner=$_POST['loaner'];
      $this->validate($request,[
          'amount' => 'required',
          'date' => 'required',
          'rep_date' => 'required',
      ],
      [
          'amount.required' => 'Please enter received amount!',
          'date.required' => 'Please enter received date!',
          'rep_date.required' => 'Please enter loan paid date!',
      ]);
      $insertReceived= LoanReceived::insert(
          [
              'loaner_id'=>$loaner,
              'loan_rec_amount'=>$_POST['amount'],
              'loan_rec_date'=>$_POST['date'],
              'loan_replay_date'=>$_POST['rep_date'],
              'loan_remarks'=>$_POST['remarks'],
              'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
          ]
      );
      if($insertReceived){
          Session::flash('success','value');
          return redirect('/admin/loan/received/');
      }else{
          Session::flash('error','value');
          return redirect('/admin/loaner/deatils/'.$loaner);
      }
  }

  public function insert_paid(Request $request){
      $loaner=$_POST['loaner'];
      $this->validate($request,[
          'amount' => 'required',
          'date' => 'required',
      ],
      [
          'amount.required' => 'Please enter paid amount!',
          'date.required' => 'Please enter paid date!'
      ]);
      $insertPaid= LoanPaid::insert(
          [
              'loaner_id'=>$loaner,
              'loan_paid_amount'=>$_POST['amount'],
              'loan_paid_date'=>$_POST['date'],
              'loan_paid_replay_date'=>$_POST['rep_date'],
              'loan_paid_remarks'=>$_POST['remarks'],
              'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
          ]
      );
      if($insertPaid){
          Session::flash('success','value');
          return redirect('/admin/loan/paid/');
      }else{
          Session::flash('error','value');
          return redirect('/admin/loaner/deatils/'.$loaner);
      }
  }

  public function insert_given(Request $request){
      $loaner=$_POST['loaner'];
      $this->validate($request,[
          'amount' => 'required',
          'date' => 'required',
          'rep_date' => 'required',
      ],
      [
          'amount.required' => 'Please enter given amount!',
          'date.required' => 'Please enter given date!',
          'rep_date.required' => 'Please enter payment date!'
      ]);
      $insertGiven= LoanGiven::insert(
          [
              'loaner_id'=>$loaner,
              'loan_given_amount'=>$_POST['amount'],
              'loan_given_date'=>$_POST['date'],
              'loan_given_replay_date'=>$_POST['rep_date'],
              'loan_given_remarks'=>$_POST['remarks'],
              'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
          ]
      );
      if($insertGiven){
          Session::flash('success','value');
          return redirect('/admin/loan/given/');
      }else{
          Session::flash('error','value');
          return redirect('/admin/loaner/deatils/'.$loaner);
      }
  }

  public function insert_payment(Request $request){
      $loaner=$_POST['loaner'];
      $this->validate($request,[
          'amount' => 'required',
          'date' => 'required',
      ],
      [
          'amount.required' => 'Please enter given amount!',
          'date.required' => 'Please enter given date!',
      ]);
      $insertPayment= LoanPayment::insert(
          [
              'loaner_id'=>$loaner,
              'loan_payment_amount'=>$_POST['amount'],
              'loan_payment_date'=>$_POST['date'],
              'loan_payment_replay_date'=>$_POST['rep_date'],
              'loan_payment_remarks'=>$_POST['remarks'],
              'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
          ]
      );
      if($insertPayment){
          Session::flash('success','value');
          return redirect('/admin/loan/payment/');
      }else{
          Session::flash('error','value');
          return redirect('/admin/loaner/deatils/'.$loaner);
      }
  }
}
