<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanPayment extends Model{
  protected $primaryKey='loan_payment_id';
  public function loanPaymentName(){
    return $this->belongsTo('App\Loaner','loaner_id','loaner_id');
  }
}
