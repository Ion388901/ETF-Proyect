<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'portfolio_id',
        'price'
    ];

    public function order() 
    {
        return $this->hasOne('App\Models\Order');
    }

    public function portfolio() 
    {
        return $this->belongsTo('App\Models\Order');
    }
}