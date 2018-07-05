<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Collective\Html\Eloquent\FormAccessible;

/**
 * Class Product
 * @package App
 * @method static find($int)
 */
class Product extends Model
{

    
    // use FormAccessible;
    

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


    /**
     * The attributes that are default values.
     *
     * @var array
     */
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
     * this is a recommended way to declare event handlers
     */
    protected static function boot() 
    {
        parent::boot();

        // Событие перед удалением модели:
        static::deleting(function($product) { 
            $product->beforeDelete();
        });      
    }


    /*
    |--------------------------------------------------------------------------
    | Отношения с другими моделями
    |--------------------------------------------------------------------------
    */
   
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
     * Relation to FeatureValue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function featureValues()
    {
        
        return $this->belongsToMany(FeatureValue::class);
    }


    /*
    |--------------------------------------------------------------------------
    | Методы для работы со свойствами товара
    |--------------------------------------------------------------------------
    */ 

    /**
     * Получаем данные свойств товара для генерации формы
     * @return  array
     */
    public function getFormFeatures()
    {        
        $fields = [];
        $features = $this->group->getFormFeatures();  
        if ($features) {
            foreach ($features as $feature) {
                $feature = collect($feature);
                $values = $this->featureValues->where('feature_id', $feature['id']);
                if ($values->first()) {
                    switch ($feature['type']) {
                        case 'select':
                        case 'multiselect':
                        case 'radio':
                        case 'checkbox':
                        case 'image':
                        case 'file':
                        case 'number':
                        case 'date':
                            $feature->put('values', $values->pluck('id'));     
                        break;

                        default:
                            $value = $values->first();
                            $feature->put('values', ['id' => $value->id, 'value' => $value->value]);  
                        break;
                    }            
                }
                $fields[] = $feature->toArray();
            }           
        }

        return $fields;
    }

    /**
     * Подготовка данных для синхронизации из request полей формы
     * @param array $formFeatures
     * @return array of $ids
     */
    protected function prepareFormFeatures(array $formFeatures)
    {
        
        $ids = [];
        $features = $this->group->features;

        foreach ($formFeatures as $feature_id => $values) {
            foreach ($values as $feature_value_id => $value) {
                switch ($features->find($feature_id)->type) {
                    case 'text':
                    case 'textarea':
                        $id = FeatureValue::findOrNew($feature_value_id)->saveOrDelete($feature_id, $value);    
                        if ($id) 
                            $ids[] = $id;
                    break;
                    default:
                        $ids[] = $value; 
                    break;
                }   
            }   
        }

        return $ids;
    }

    /**
     * Привязка идентификаторов значений свойтств(featureValues) товара 
     * @param $features
     * @return array
     */
    public function syncFeatures(array $features)
    {
          
        return $this->featureValues()->sync($this->prepareFormFeatures($features));
    }


    /*
    |--------------------------------------------------------------------------
    | События
    |--------------------------------------------------------------------------
    */ 
   
    /**
     * Before delete model helper
     */
    protected function beforeDelete() 
    {

        // Дополнительно, чистим все значения характеристик не являющимися опциями товаров  
        $this->featureValues->each(function($value){
            switch ($value->feature->type) {
                case 'text':
                case 'textarea':
                    $value->delete();           
                break;
            }   
        });        
    }




       
                

}
