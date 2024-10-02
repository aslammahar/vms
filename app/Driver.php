<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'drivers';
    protected $fillable =
     [
       'name',
      'license_number',
       'vehicle_id',
        'status'
    ];

    public function vehicle()
     {
        return $this->belongsTo(Vehicle::class);
    }

    
    public function salaries()
{
    return $this->hasMany(Salary::class);
}

}
