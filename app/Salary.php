<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'salaries';
    protected $fillable =
    [
      'driver_id',
     'amount',
      'payment_date',
   ];



//     public function driver()
// {
//     return $this->belongsTo(Driver::class);
// }
  public function driver()
{
    return $this->belongsTo(Driver::class, 'driver_id');
}

}
