<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class delivery_request_items extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'delivery_request_items';

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
                  'delivery_request_id',
                  'ref',
                  'description',
                  'qty',
                  'price',
                  'total'
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
     * Get the deliveryRequest for this model.
     */
    public function deliveryRequest()
    {
        return $this->belongsTo('App\Models\delivery_requests','delivery_request_id');
    }



}
