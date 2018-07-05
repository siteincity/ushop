<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
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
        'title',
    ];


    /**
     * this is a recommended way to declare event handlers
     */
    protected static function boot() 
    {
        parent::boot();

        // Событие перед удалением модели:
        static::deleting(function($group) { 
            $group->products->each(function($product){              
                $product->delete();                  
            });
        });   
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function products()
    {
        
        return $this->hasMany(Product::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        
        return $this->belongsToMany(Feature::class);
    }


    /**
     * @return array
     **/
    public static function getList()
    {

        return self::all()->pluck('title','id')->toArray();
    }


    /**
     * @return Array
     */
    public function getFormFeatures()
    {
        
        $fields = [];
        $features = $this->features->load('featureValues');
        
        foreach ($features as $feature) {
            $fields[] = collect($feature)
                ->put('options', $feature->featureValues->pluck('value','id'))->except(['pivot'])
                ->put('values', null)
                ->toArray();     
        }

        return $fields;           
    }



}
