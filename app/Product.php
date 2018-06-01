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
        'published',
        //'slug', 
        //'articul',
        //'price',
    ];

    protected $attributes = [
        'published' => 1,    
    ];


    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;


    // /**
    //  * Update the model in the database.
    //  *
    //  * @param  array  $attributes
    //  * @param  array  $options
    //  * @return bool
    //  */
    // public function update(array $attributes = [], array $options = [])
    // {
    //     $attributes['published'] = isset($attributes['published']) ? $attributes['published'] : 0;

    //     parent::update($attributes,$options);
    // }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {

        return $this->hasOne('App\Group');
    }



}
