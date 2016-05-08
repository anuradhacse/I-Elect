<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'user_id', 'name', 'organization',
    ];

    /**
     * Admin can have many elections
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elections(){
    return $this->hasMany('App\Election');
}
}
