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
     * Relation to FeatureValue
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function featureValues()
    {
        
        return $this->belongsToMany(FeatureValue::class);
    }



    /**
     * 
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
     * @param $features
     * @return  array of $ids
     */
    public function saveFormFeatures(array $formFeatures)
    {
        
        $sync = [];
        $features = $this->group->features;

        foreach ($formFeatures as $feature_id => $values) {
            foreach ($values as $feature_value_id => $value) {
                switch ($features->find($feature_id)->type) {
                    case 'text':
                    case 'textarea':
                        
                        $featureValue = FeatureValue::updateOrCreate(
                            ['id' => $feature_value_id],
                            ['feature_id' => $feature_id, 'value' => $value]
                        );

                        if ($featureValue)
                            $sync[] = $featureValue->id;
                            
                    break;
                    default:
                        $sync[] = $value; 
                    break;
                }   
            }   
        }

        return $sync;
    }




       
                

}
