<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable=['name','description','email'];

    public function elections(){

        return $this->belongsToMany('App\Election');
    }
}
