<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
protected $fillable=['name','details','start_time','end_time','start_date','end_date'];

    protected $dates=['start_date','end_date'];

    /**
     * an election belong to specific admin
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\Admin');

    }
        public function voters(){
             return $this->belongsToMany('App\Voter')->withPivot('candidate_id');
        }

    public function candidates(){

      return   $this->belongsToMany('App\Candidate');
    }

    public function setStartDateAttribute($date){
        $this->attributes['start_date']=Carbon::createFromFormat('Y-m-d',$date);
    }

    public function setStartTimeAttribute($time){
        $format_time=Carbon::parse($time)->toTimeString();
        return $this->attributes['start_time']=Carbon::createFromFormat('H:i:s',$format_time);
    }
    public function setEndDateAttribute($date){
        $this->attributes['end_date']=Carbon::createFromFormat('Y-m-d',$date);
    }

    public function setEndTimeAttribute($time){
        $format_time=Carbon::parse($time)->toTimeString();
        return $this->attributes['end_time']=Carbon::createFromFormat('H:i:s',$format_time);
    }

}
