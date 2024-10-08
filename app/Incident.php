<?php

namespace App;

use App\Driver;
use App\IncidentFollowup as AppIncidentFollowup;
use App\Models\IncidentFollowup;
use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{    protected $primaryKey = 'id';
    protected $table = 'incidents';
    protected $fillable = [
        'vehicle_id', 'driver_id', 'incident_date', 'location', 'description',
        'severity', 'injuries', 'damage', 'witnesses', 'police_report', 'insurance_details', 'status', 'photos'
    ];

    // Relationship to Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relationship to Driver
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function followups()
    {
        return $this->hasMany(AppIncidentFollowup::class);
    }
}
