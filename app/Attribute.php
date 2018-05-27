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
        return $this->belongsToMany(Product::class,  'product_attributes')->withPivot('value');
    }

    /**
     * undocumented function
     *
     * @return void 
     **/
    public function groups()
    {
        return $this->belongsToMany(Group::class,  'group_attributes');
    }


}
