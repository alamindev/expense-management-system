<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $primaryKey = 'income_id';
    //protected $fillable = ['asdsa', 'asdasd'];
    public function giveme(){
        return $this->belongsTo('App\Income_category', "incate_id", "incate_id");
    }
}
