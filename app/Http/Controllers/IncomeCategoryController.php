<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income_category;
use Session;
use Carbon\Carbon;

class IncomeCategoryController extends Controller {
   public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $all=Income_category::where('incate_status',1)->orderBy('incate_id','desc')->get();
        return view('income-category.all', compact('all'));
    }

    public function add() {
        return view('income-category.add');
    }

    public function edit($id) {
        $data=Income_category::where('incate_status',1)->findOrFail($id);
        return view('income-category.edit', compact('data'));
    }

    public function view($id) {
        $data=Income_category::where('incate_status',1)->findOrFail($id);
        return view('income-category.view', compact('data'));
    }

    public function insert(Request $request) {
        $this->validate($request,[
           'name'=>'required|unique:income_categories,incate_name',
        ],[
            'name.required'=>'Please enter income category name!',
            'name.unique'=>'Income category name already exists!',
        ]);
        $insertCategory = Income_category::insert(
            [
                'incate_name' => $_POST['name'],
                'incate_remarks' => $_POST['remarks'],
                'incate_creator' => '1',
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($insertCategory){
            Session::flash('success','value');
            return redirect('/admin/income/category');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/category/add');
        }
    }

    public function update(Request $request) {
        $id=$_POST['id'];
        $this->validate($request,[
           'name'=>'required'
        ],[
            'name.required'=>'Please enter income category name!'
        ]);
        $updateCate = Income_category::where('incate_id',$id)->update(
            [
                'incate_name' => $_POST['name'],
                'incate_remarks' => $_POST['remarks'],
                'incate_creator' => '1',
                'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($updateCate){
            Session::flash('success','value');
            return redirect('/admin/income/category/view/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/category/edit/'.$id);
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
            return redirect('/admin/income/category');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/category');
        }
    }

    public function delete() {
        $id=$_POST['id'];
        $softDel = Income_category::where('incate_id',$id)->update(
            [
                'incate_status' => 2
            ]
        );
        if($softDel){
            Session::flash('success','value');
            return redirect('/admin/income/category');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/category');
        }
    }

}
