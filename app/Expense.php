<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
    protected $primaryKey = 'expense_id';
    public function giveme(){
        return $this->belongsTo('App\Expense_category', "expcate_id", "expcate_id");
    }

}
