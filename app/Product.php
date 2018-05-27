<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',  
        //'slug', 
        //'articul',
        //'price',
    ];

    /**
     * Relation to Attribute
     *
     * @return obj 
     **/
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute', 'product_attributes')->withPivot('value');
    }

    /**
     * Relation to Group
     *
     * @return obj 
     **/
    public function group()
    {
        return $this->hasOne('App\Group');
    }

}
