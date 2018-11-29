<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class delivery_agent extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_agents';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'delivery_company_id',
                  'phone',
                  'cin',
                  'dln',
                  'photo'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the deliveryCompany for this model.
     */
    public function deliveryCompany()
    {
        return $this->belongsTo('App\Models\DeliveryCompany','delivery_company_id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat('j/n/Y g:i A', $value);

    }

}
