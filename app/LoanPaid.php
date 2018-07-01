<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanPaid extends Model{
    protected $primaryKey='loan_paid_id';
    public function loanPaidName(){
      return $this->belongsTo('App\Loaner','loaner_id','loaner_id');
    }
}
