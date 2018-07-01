<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense_category;
use Session;
use Carbon\Carbon;

class ExpenseCategoryController extends Controller {
 public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $all=Expense_category::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
        return view('expense-category.all', compact('all'));
    }

    public function add(){
        return view('expense-category.add');
    }

    public function edit($id){
        $data=Expense_category::where('expcate_status',1)->findOrFail($id);
        return view('expense-category.edit',compact('data'));
    }

    public function view($id){
        $data=Expense_category::where('expcate_status',1)->findOrFail($id);
        return view('expense-category.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
           'name'=>'required|unique:expense_categories,expcate_name',
        ],[
            'name.required'=>'Please enter expense category name!',
            'name.unique'=>'Expense category name already exists!',
        ]);
        $insertExpenseCate=Expense_category::insert(
            [
                'expcate_name' => $_POST['name'],
                'expcate_remarks' => $_POST['remarks'],
                'expcate_creator' => '1',
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($insertExpenseCate){
            Session::flash('success','value');
            return redirect('/admin/expense/category');
        }else{
            Session::flash('success','value');
            return redirect('/admin/expense/category/add');
        }
    }

    public function update(Request $request){
        $id=$_POST['id'];
        $this->validate($request,[
           'name'=>'required',
        ],[
            'name.required'=>'Please enter expense category name!',
        ]);
        $updateCate=Expense_category::where('expcate_id',$id)->update(
            [
                'expcate_name' => $_POST['name'],
                'expcate_remarks' => $_POST['remarks'],
                'expcate_creator' => '1',
                'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($updateCate){
            Session::flash('success','value');
            return redirect('/admin/expense/category/view/'.$id);
        }else{
            Session::flash('success','value');
            return redirect('/admin/expense/category/edit/'.$id);
        }
    }

    public function softdelete() {
        $id=$_POST['modal_id'];
        $softDel = Expense_category::where('expcate_id',$id)->update(
            [
                'expcate_status' => 0
            ]
        );
        if($softDel){
            Session::flash('success','value');
            return redirect('/admin/expense/category');
        }else{
            Session::flash('error','value');
            return redirect('/admin/expense/category');
        }
    }
}
