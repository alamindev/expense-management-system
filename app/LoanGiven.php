<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanGiven extends Model{
  protected $primaryKey='loan_given_id';
  public function loanGivenName(){
    return $this->belongsTo('App\Loaner','loaner_id','loaner_id');
  }
}
