<?php

namespace Hubleto\App\Custom\CarRental\Models;

use Hubleto\App\Community\Customers\Models\Customer;
use Hubleto\Erp\Model;
use Hubleto\Framework\Db\Column\Boolean;
use Hubleto\Framework\Db\Column\Date;
use Hubleto\Framework\Db\Column\Decimal;
use Hubleto\Framework\Db\Column\Lookup;
use Hubleto\Framework\Db\Column\Varchar;
use Hubleto\Framework\Description\Table;

class RentalHistory extends Model {
  public bool $isExtendableByCustomColumns = true;

  public string $table = 'rental_history';
  public string $recordManagerClass = RecordManagers\RentalHistory::class;
  public ?string $lookupSqlValue = '{%TABLE%}.start_date';

  public array $relations = [
    "CAR" => [ self::BELONGS_TO, Car::class, "id_car", "id"]
  ];

  public function describeColumns(): array
  {
    return array_merge(parent::describeColumns(), [
      "id_car" => (new Lookup($this, "Car", Car::class))->setRequired(),
      "id_customer" => (new Lookup($this, "Customer", Customer::class))->setRequired(),
      "rental_length" => (new Varchar($this, "Rental Length"))->setEnumValues([
        1 => "1 - 3 days",
        2 => "4 - 6 days",
        3 => "7 - 10 days"
      ])->setRequired(),
      "start_date" => (new Date($this, "Date of rental"))->setRequired()->setDefaultValue(date("Y-m-d")),
      "end_date" => (new Date($this, "Expected date of rental return")),
      "return_date" => (new Date($this, "Return of the rental")),
      "price" => (new Decimal($this, "Full price of rental")),
      "is_complete" => (new Boolean($this, "Completion of the rent period")),
    ]);
  }

  public function onAfterCreate(array $savedRecord): array
  {
    $mCars = $this->getModel(Car::class);
    $car = $mCars->record->find($savedRecord["id_car"]);
    $car->update(["availability" => 0]);

    return parent::onAfterCreate($savedRecord);
  }

  public function onAfterUpdate(array $originalRecord, array $savedRecord): array {
    $mCars = $this->getModel(Car::class);
    $car = $mCars->record->find($savedRecord["id_car"]);
    if ((bool) $savedRecord["is_complete"] == true) {
      $car->update(["availability" => 1]);
    } else {
      $car->update(["availability" => 0]);
    }

    return parent::onAfterUpdate($originalRecord, $savedRecord);
  }

  public function describeTable(): Table
  {
    $description = parent::describeTable();
    $description->ui['addButtonText'] = 'New rental';
    $description->ui['showFulltextSearch'] = true;
    return $description;
  }
}