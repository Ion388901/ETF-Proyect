<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model {
    
    public $table = 'contracts';
    
    protected $fillable = [
        'name',
        'description',
        'status',
        'portfolio_id'
    ];

    public function portfolio()
    {
        return $this->belongsTo('App\Models\Portfolio');
    }
}