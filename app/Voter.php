<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    /**
     * put user id inside fillable other wise intergrity constraint violation error
     * @var array
     */
    protected $fillable=['name','user_id'];


    public function elections(){
        return $this->belongsToMany('App\Election')->withPivot('candidate_id');
    }
}
