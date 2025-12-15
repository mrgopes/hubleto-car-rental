<?php

namespace Hubleto\App\Custom\CarRental\Models\RecordManagers;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalHistory extends \Hubleto\Erp\RecordManager
{
  public $table = 'rental_history';

  /** @return BelongsTo<Car, covariant Car> */
  public function CAR(): BelongsTo
  {
    return $this->belongsTo(Car::class, 'id_car', 'id');
  }
}
