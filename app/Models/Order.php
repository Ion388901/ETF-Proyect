<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public $table = 'orders';

    protected $fillable = [
        'user_id',
        'cart_id',
        'name',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }
    
}