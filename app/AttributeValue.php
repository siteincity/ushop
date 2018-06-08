<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        
        return $this->belongsTo(Attribute::class);
    }


    /**
     * Relation to Attribute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        
        return $this->belongsToMany(Product::class);
    }


}
