<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gadget extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'stock',
        'acquired_on',
    ];

    public function container() {
        return $this->belongsTo('App\Models\Product', 'acquired_on', 'id');
    }
}
