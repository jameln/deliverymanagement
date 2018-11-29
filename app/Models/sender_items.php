<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sender_items extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sender_items';

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
                  'sender_company_id',
                  'ref',
                  'description',
                  'price',
                  'img'
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
        return $this->belongsTo('App\Models\sender_companies','sender_company_id');
    }



}
