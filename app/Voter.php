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
}
