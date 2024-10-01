<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'vehicles';
    protected $fillable = [
        'make',
        'model',
        'year',
        'registration_number',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
