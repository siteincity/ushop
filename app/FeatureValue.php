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
     * Обновить, добавить новую или удалить запись
     * Пример: App\FeatureValue::findOrNew($id)->saveOrDelete($feature_id, 'Текст ...');
     * @return $id or null
     */
    public function saveOrDelete($feature_id, $value)
    {
        
        if (!$value) 
            if ($this->delete())
                return null;

        $this->feature_id = $feature_id;
        $this->value = $value;
        $this->save();

        return $this->id;                  
    }





}
