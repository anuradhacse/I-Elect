<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
protected $fillable=['name','details','start_time','end_time','start_date','end_date'];

    /**
     * an election belong to specific admin
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin(){
    return $this->belongsTo('App\Admin');
}
}
