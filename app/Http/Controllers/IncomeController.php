<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Income;
use App\Income_category;
use Session;
use Carbon\Carbon;
use DB;

class IncomeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        $all=Income::where('income_status',1)
                ->join('income_categories','incomes.incate_id','=', 'income_categories.incate_id')
                ->orderBy('income_id','DESC')
                ->get();
        return view('income.all', compact('all'));
    }

    public function add(){
        $cateList=Income_category::All();
        return view('income.add', compact('cateList'));
    }

    public function edit($id){
        $cateList=Income_category::All();
        $income=Income::where('income_status',1)->findOrFail($id);
        return view('income.edit',compact('cateList','income'));
    }

    public function view($id){
        $data=Income::where('income_status',1)->where('income_id',$id)->firstOrFail();
        return view('income.view', compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
           'details'=>'required',
           'amount'=>'required',
           'date'=>'required',
           'category'=>'required',
        ],[
            'details.required'=>'Please enter income details!',
            'amount.required'=>'Please enter income amaount!',
            'date.required'=>'Please enter income date!',
            'category.required'=>'Please select income category!'
        ]);
        $IncomeInsert=Income::insert(
            [
                'income_details'=>$_POST['details'],
                'income_amount'=>$_POST['amount'],
                'income_date'=>$_POST['date'],
                'incate_id'=>$_POST['category'],
                'creator_id' => '1',
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($IncomeInsert){
            Session::flash('success','value');
            return redirect('/admin/income/add');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/add');
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
            'details.required'=>'Please enter income details!',
            'amount.required'=>'Please enter income amaount!',
            'date.required'=>'Please enter income date!',
            'category.required'=>'Please select income category!'
        ]);
        $IncomeUpdate=Income::where('income_id',$id)->update(
            [
                'income_details'=>$_POST['details'],
                'income_amount' => $_POST['amount'],
                'income_date' => $_POST['date'],
                'incate_id'=>$_POST['category'],
                'updated_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );
        if($IncomeUpdate){
            Session::flash('success','value');
            return redirect('/admin/income/view/'.$id);
        }else{
            Session::flash('error','value');
            return redirect('/admin/income/edit/'.$id);
        }
    }

    public function softdelete() {
        $id=$_POST['modal_id'];
        $softDel = Income::where('income_id',$id)->update(
            [
                'income_status' => 0
            ]
        );
        if($softDel){
            Session::flash('success','value');
            return redirect('/admin/income');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income');
        }
    }

    public function delete() {
        $id=$_POST['id'];
        $Del = Income::where('income_id',$id)->update(
            [
                'income_status' => 0
            ]
        );
        if($Del){
            Session::flash('success','value');
            return redirect('/admin/income');
        }else{
            Session::flash('error','value');
            return redirect('/admin/income');
        }
    }
}
