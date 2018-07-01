<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Income;
use App\Expense;

class RecycleController extends Controller{
 public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        
    }
    
    public function income($id){
        $all=Income::where('income_status',0)->orderBy('income_id',$id)->get();
        return view('recycle.income',compact('all'));
    }
    
    public function expense(){
        
    }
}
