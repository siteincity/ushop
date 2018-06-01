<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
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
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {

        return $this->belongsToMany('App\Attribute', 'product_attributes')->withPivot('value');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {

        return $this->hasOne('App\Group');
    }



}
