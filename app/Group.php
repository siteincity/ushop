<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
    ];

    /**
     * undocumented function
     *
     * @return void 
     **/
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,  'group_attributes');
    }

}
