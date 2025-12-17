<?php

namespace Hubleto\App\Custom\CarRental\Models\RecordManagers;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends \Hubleto\Erp\RecordManager
{
  public $table = 'cars';

  /** @return HasMany<RentalHistory, covariant RentalHistory> */
  public function HISTORY(): HasMany
  {
    return $this->hasMany(RentalHistory::class, 'id_car');
  }
}
