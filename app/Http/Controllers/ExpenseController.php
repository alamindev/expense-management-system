<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Expense_category;
use Session;
use Carbon\Carbon;
use DB;

class ExpenseController extends Controller {
 public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        //$all=Expense::orderBy('expense_id','DESC')->get();
        $all=Expense::where('expense_status',1)
            ->leftJoin('expense_categories', 'expenses.expcate_id', '=', 'expense_categories.expcate_id')
            ->orderBy('expense_id','DESC')
            ->get();
        return view('expense.all', compact('all'));
    }

    public function add(){
        $expcatelist=Expense_category::where('expcate_status',1)->get();
        return view('expense.add', compact('expcatelist'));
    }

    public function edit($id){
        $expcatelist=Expense_category::where('expcate_status',1)->get();
        $expense=Expense::where('expense_status',1)->findOrFail($id);
        return view('expense.edit', compact('expcatelist','expense'));
    }

    public function view($id){
        $data=Expense::where('expense_status',1)->where('expense_id',$id)->firstOrFail();
        return view('expense.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
           'details'=>'required',
           'amount'=>'required',
           'date'=>'required',
           'category'=>'required',
        ],[
            'details.required'=>'Please enter expense details!',
            'amount.required'=>'Please enter expense amaount!',
            'date.required'=>'Please enter expense date!',
            'category.required'=>'Please select expense category!'
        ]);
        $insertExpense=Expense::insert(
            [
                'expense_details'=>$_POST['details'],
                'expense_amount'=>$_POST['amount'],
                'expense_date'=>$_POST['date'],
                'expcate_id'=>$_POST['category'],
                'creator_id' => '1',
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($insertExpense){
            Session::flash('success','value');
            return redirect('/admin/expense');
        }else{
            Session::flash('error','value');
            return redirect('/admin/expense/add');
        }
    }

    public function update(Request $request){
        $id=$_POST['id'];
        $this->validate($request,[
           'details'=>'required',
           'amount'=>'required',
           'date'=>'required',
           'category'=>'required',
        ],[
            'details.required'=>'Please enter expense details!',
            'amount.required'=>'Please enter expense amaount!',
            'date.required'=>'Please enter expense date!',
            'category.required'=>'Please select expense category!'
        ]);
        $ExpenseUpdate=Expense::where('expense_id',$id)->update(
            [
                'expense_details'=>$_POST['details'],
                'expense_amount' => $_POST['amount'],
                'expense_date' => $_POST['date'],
                'expcate_id'=>$_POST['category'],
                'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($ExpenseUpdate){
            Session::flash('success','value');
            return redirect('/admin/expense/view/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('/admin/expense/edit/'.$id);
        }
    }

    public function softdelete() {
        $id=$_POST['modal_id'];
        $softDel = Expense::where('expense_id',$id)->update(
            [
                'expense_status' => 0
            ]
        );
        if($softDel){
            Session::flash('success','value');
            return redirect('/admin/expense');
        }else{
            Session::flash('error','value');
            return redirect('/admin/expense');
        }
    }
}
