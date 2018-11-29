<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sender_company extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sender_companies';

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
                  'company_name',
                  'tva',
                  'country',
                  'city',
                  'state',
                  'adress',
                  'lat',
                  'lng',
                  'phone',
                  'phone2',
                  'fax',
                  'logo',
                  'website',
                  'currency_id',
                  'sender_category_id'
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
     * Get the currency for this model.
     */
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency','currency_id');
    }

    /**
     * Get the senderCategory for this model.
     */
    public function senderCategory()
    {
        return $this->belongsTo('App\Models\SenderCategory','sender_category_id');
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
