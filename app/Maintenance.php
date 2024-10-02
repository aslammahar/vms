<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    // use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'maintenance';
    protected $fillable =
    [
        'vehicle_id',
         'date',
         'description',
          'cost'
        ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
