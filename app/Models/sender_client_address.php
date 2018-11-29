<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sender_client_address extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sender_client_addresses';

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
                  'sender_client_id',
                  'name',
                  'country',
                  'county',
                  'city',
                  'state',
                  'address',
                  'lat',
                  'lng'
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
     * Get the senderClient for this model.
     */
    public function senderClient()
    {
        return $this->belongsTo('App\Models\SenderClient','sender_client_id');
    }



}
