<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanReceived extends Model{
  protected $primaryKey='loan_rec_id';
  public function loanReceiverName(){
    return $this->belongsTo('App\Loaner','loaner_id','loaner_id');
  }
}
