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
     * @return \Illuminate\Database\Eloquent\Collection
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
