<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureValue extends Model
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
        'feature_id',
        'value',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feature()
    {
        
        return $this->belongsTo(Feature::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function products()
    {
        
        return $this->belongsToMany(Product::class);
    }


}
