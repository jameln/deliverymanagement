<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class delivery_companies extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_companies';

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
                  'county',
                  'city',
                  'state',
                  'address',
                  'lat',
                  'lng',
                  'phone',
                  'phone2',
                  'fax',
                  'logo',
                  'website',
                  'currencies_id'
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
        return $this->belongsTo('App\Models\currencies','currency_id');
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
