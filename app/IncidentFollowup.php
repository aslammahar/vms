<?php

namespace App;

use App\Incident;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentFollowup extends Model
{
    // use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'incident_followups';
    protected $fillable = ['incident_id', 'action_type', 'description', 'action_date'];

    // Relationship with Incident model
    public function incident()
    {
        return $this->belongsTo(Incident::class);
    }
}
