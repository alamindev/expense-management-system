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

class LoanerController extends Controller{
  public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $all=Loaner::where('loaner_status',1)->orderBy('loaner_name','ASC')->get();
        return view('loaner.all', compact('all'));
    }

    public function add(){
        return view('loaner.add');
    }

    public function edit($id){
        $data=Loaner::where('loaner_status',1)->where('loaner_id',$id)->firstOrFail();
        return view('loaner.edit',compact('data'));
    }

    public function details($id){
        $data=Loaner::where('loaner_status',1)->where('loaner_id',$id)->firstOrFail();
        $loanrec=LoanReceived::where('loan_rec_status',1)->where('loaner_id',$id)->get();
        $loanpaid=LoanPaid::where('loan_paid_status',1)->where('loaner_id',$id)->get();
        $loangiven=LoanGiven::where('loan_given_status',1)->where('loaner_id',$id)->get();
        $loanpayment=LoanPayment::where('loan_payment_status',1)->where('loaner_id',$id)->get();
        return view('loaner.details',compact('data','loanrec','loanpaid','loangiven','loanpayment'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name' => 'required|min:5|max:35',
            'phone' => 'required|unique:loaners,loaner_phone'
        ],
        [
            'name.required' => 'Please enter name!',
            'name.min' => 'Name must be at least 5 characters.',
            'name.max' => 'Name may not be greater than 35 characters.',
            'phone.required' => 'Please enter phone number!',
            'phone.unique' => 'Phone number already exists!',
        ]);
        $insertLoaner= Loaner::insert(
            [
                'loaner_name'=>$_POST['name'],
                'loaner_phone'=>$_POST['phone'],
                'loaner_email'=>$_POST['email'],
                'loaner_remarks'=>$_POST['remarks'],
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($insertLoaner){
            Session::flash('success','value');
            return redirect('/admin/loaner');
        }else{
            Session::flash('error','value');
            return redirect('/admin/loaner/add');
        }
    }

    public function update(Request $request){
        $id=$_POST['id'];
        $this->validate($request,[
            'name' => 'required|min:5|max:35',
            'phone' => 'required'
        ],
        [
            'name.required' => 'Please enter name!',
            'name.min' => 'Name must be at least 5 characters.',
            'name.max' => 'Name may not be greater than 35 characters.',
            'phone.required' => 'Please enter phone number!',
        ]);


        $updateLoaner= Loaner::where('loaner_id',$id)->update(
            [
                'loaner_name'=>$_POST['name'],
                'loaner_phone'=>$_POST['phone'],
                'loaner_email'=>$_POST['email'],
                'loaner_remarks'=>$_POST['remarks'],
                'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($updateLoaner){
            Session::flash('success','value');
            return redirect('/admin/loaner/view/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('/admin/loaner/edit/'.$id);
        }
    }

    public function softdelete() {
        $id=$_POST['modal_id'];
        $softDel = Income_category::where('incate_id',$id)->update(
            [
                'incate_status' => 0
            ]
        );
        if($softDel){
            Session::flash('success','value');
            return redirect('/admin/loaner');
        }else{
            Session::flash('error','value');
            return redirect('/admin/loaner');
        }
    }
}
