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
        'group_id',
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


    /**
     * Relation to Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {

        return $this->belongsTo(Group::class);
    }


  
    /**
     * Relation to AttributeValue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function values()
    {
        
        return $this->belongsToMany(AttributeValue::class);
    }




}
