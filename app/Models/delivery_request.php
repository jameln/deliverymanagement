<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class delivery_request extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_requests';

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
                  'ref',
                  'sender_company_id',
                  'sender_site_id',
                  'sender_client_id',
                  'sender_client_address_id',
                  'delivery_company_id',
                  'pricedelivery_price',
                  'total_to_pay',
                  'currency_id',
                  'statuses_id'
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
     * Get the senderCompany for this model.
     */
    public function senderCompany()
    {
        return $this->belongsTo('App\Models\SenderCompany','sender_company_id');
    }

    /**
     * Get the senderSite for this model.
     */
    public function senderSite()
    {
        return $this->belongsTo('App\Models\SenderSite','sender_site_id');
    }

    /**
     * Get the senderClient for this model.
     */
    public function senderClient()
    {
        return $this->belongsTo('App\Models\SenderClient','sender_client_id');
    }

    /**
     * Get the senderClientAddress for this model.
     */
    public function senderClientAddress()
    {
        return $this->belongsTo('App\Models\SenderClientAddress','sender_client_address_id');
    }

    /**
     * Get the deliveryCompany for this model.
     */
    public function deliveryCompany()
    {
        return $this->belongsTo('App\Models\DeliveryCompany','delivery_company_id');
    }

    /**
     * Get the currency for this model.
     */
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency','currency_id');
    }

    /**
     * Get the status for this model.
     */
    public function statuses()
    {
        return $this->belongsTo('App\Models\statuses','statuses_id');
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
