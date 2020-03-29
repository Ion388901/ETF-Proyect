<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model {

    public $table = 'portfolios';

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract');
    }

    public function orders()
    {
        return $this->hasOne('App\Models\Order');
    }

}