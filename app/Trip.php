<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'driver_id',
        'vehicle_id',
        'route',
        'departure_time',
        'return_time',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function getPerformanceMetricsAttribute()
{
    return $this->distance_covered > 0 ? $this->distance_covered / $this->fuel_consumption : 0;
}
}
