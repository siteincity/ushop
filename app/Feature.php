<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
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
    public function groups()
    {
        
        return $this->belongsToMany(Group::class);
    }
    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function featureValues()
    {
        
        return $this->hasMany(FeatureValue::class);
    }

    
}
