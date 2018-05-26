<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 
        'slug',
        'caption',
    ];

    /**
     * undocumented function
     *
     * @return void 
     **/
    public function products()
    {
        return $this->belongsToMany('App\Product',  'product_attributes')->withPivot('value');
    }


}
