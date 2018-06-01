<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var array
     */
    protected $fillable = [
        'type',
        'slug',
        'caption',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes')->withPivot('value');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_attributes');
    }


}
