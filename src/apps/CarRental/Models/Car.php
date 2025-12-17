<?php

namespace Hubleto\App\Custom\CarRental\Models;

use Hubleto\Erp\Model;
use Hubleto\Framework\Db\Column\Boolean;
use Hubleto\Framework\Db\Column\Color;
use Hubleto\Framework\Db\Column\Decimal;
use Hubleto\Framework\Db\Column\Image;
use Hubleto\Framework\Db\Column\Integer;
use Hubleto\Framework\Db\Column\Varchar;
use Hubleto\Framework\Description\Table;

class Car extends Model {
  public bool $isExtendableByCustomColumns = true;

  public string $table = 'cars';
  public string $recordManagerClass = RecordManagers\Car::class;
  public ?string $lookupSqlValue = "CONCAT({%TABLE%}.manufacturer,' ', {%TABLE%}.model)";

  public array $relations = [
    "HISTORY" => [ self::HAS_MANY, RentalHistory::class, "id_car" ]
  ];

  public function describeColumns(): array
  {
    return array_merge(parent::describeColumns(), [
      "manufacturer" => (new Varchar($this, "Manufacturer"))->setRequired(),
      "model" => (new Varchar($this, "Model")),
      "licence_plate" => (new Varchar($this, "Licence plate")),
      "fuel" => (new Integer($this, "Fuel"))->setEnumValues([
        1 => "Gasoline",
        2 => "Diesel",
      ]),
      "gearbox" => (new Integer($this, "Gearbox"))->setEnumValues([
        1 => "Automatic",
        2 => "Manual",
      ]),
      "seats" => (new Integer($this, "Number of seats")),
      "price_per_day" => (new Decimal($this, "Base price per day")),
      "color" => (new Color($this, "Color")),
      "picture" => (new Image($this, "Picture")),
      "availability" => (new Boolean($this, "Availability"))->setDefaultValue(1),
    ]);
  }

  public function describeTable(): Table
  {
    $description = parent::describeTable();
    $description->ui['addButtonText'] = 'Add new car';
    $description->ui['showFulltextSearch'] = true;
    return $description;
  }

}